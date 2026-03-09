<?php
function connectDB() {
    $host = 'localhost';
    $db   = 'db_aset';
    $user = 'root'; // Sesuaikan username database
    $pass = 'root';     // Sesuaikan password database
    $charset = 'utf8mb4';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // Menampilkan error
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       // Hasil berupa array asosiatif
        PDO::ATTR_EMULATE_PREPARES   => false,                  // Memastikan prepared statement aman
    ];

    try {
        return new PDO($dsn, $user, $pass, $options);
    } catch (\PDOException $e) {
        die("Maaf koneksi gagal");
    }
}

// --- FUNGSI INSERT ---
function insertData($koneksiku, $table, $data) {
    try {
        // Mengambil nama kolom dari key array
        $columns = implode(", ", array_keys($data));
        
        // Membuat placeholder (contoh: :nama, :email)
        $placeholders = ":" . implode(", :", array_keys($data));
        
        $sql = "INSERT INTO $table ($columns) VALUES ($placeholders)";
        
        $stmt = $koneksiku->prepare($sql);
        return $stmt->execute($data); // Mengembalikan true jika berhasil
    }
    catch (PDOException $e) {
        // Cek jika error disebabkan oleh data duplikat (Error code 23000)
        return false;
    }
}

function selectData($koneksiku, $table, $conditions = [], $columns = "*", $orderBy = null, $limit = null) {
    // 1. Memproses kolom (bisa string "Nama, Email" atau fungsi agregat "COUNT(*)")
    $columnString = is_array($columns) ? implode(", ", $columns) : $columns;
    
    $sql = "SELECT $columnString FROM $table";
    $params = [];

    // 2. Logika WHERE yang fleksibel (mendukung operator !=, <, >, dll)
    if (!empty($conditions)) {
        $whereClauses = [];
        foreach ($conditions as $key => $value) {
            $key = trim($key);
            if (strpos($key, ' ') !== false) {
                // Mendukung "Status !=", "Gaji >", dll
                $parts = explode(' ', $key);
                $column = $parts[0];
                $operator = $parts[1];
                $whereClauses[] = "$column $operator :$column";
                $params[$column] = $value;
            } else {
                // Default operator "="
                $whereClauses[] = "$key = :$key";
                $params[$key] = $value;
            }
        }
        $sql .= " WHERE " . implode(" AND ", $whereClauses);
    }

    // 3. Tambahkan Order By dan Limit jika ada
    if ($orderBy) $sql .= " ORDER BY $orderBy";
    if ($limit)   $sql .= " LIMIT $limit";

    $stmt = $koneksiku->prepare($sql);
    $stmt->execute($params);
    
    // 4. Return Data
    // Jika limit 1 dan hanya minta 1 kolom agregat, langsung kembalikan nilainya saja
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    return $result;
}

// --- FUNGSI UPDATE ---
function updateData($koneksiku, $table, $data, $conditions) {
    try{
        $setClauses = [];
        $executeData = [];
        
        // Setup bagian SET
        foreach ($data as $key => $value) {
            $setClauses[] = "$key = :set_$key";
            $executeData["set_$key"] = $value;
        }
        
        // Setup bagian WHERE
        $whereClauses = [];
        foreach ($conditions as $key => $value) {
            $whereClauses[] = "$key = :cond_$key";
            $executeData["cond_$key"] = $value;
        }
        
        $sql = "UPDATE $table SET " . implode(", ", $setClauses) . " WHERE " . implode(" AND ", $whereClauses);
        
        $stmt = $koneksiku->prepare($sql);
        return $stmt->execute($executeData); // Mengembalikan true jika berhasil
    }
    catch (PDOException $e) {
        // Cek jika error disebabkan oleh data duplikat (Error code 23000)
        return false;
    }
}

// --- FUNGSI DELETE ---
function deleteData($koneksiku, $table, $conditions) {
    try{
        $whereClauses = [];
        
        foreach ($conditions as $key => $value) {
            $whereClauses[] = "$key = :$key";
        }
        
        $sql = "DELETE FROM $table WHERE " . implode(" AND ", $whereClauses);
        
        $stmt = $koneksiku->prepare($sql);
        return $stmt->execute($conditions); // Mengembalikan true jika berhasil
    }
    catch (PDOException $e) {
        // Cek jika error disebabkan oleh data duplikat (Error code 23000)
        return false;
    }
}
?>