<?php
include 'koneksi.php';
$request = $_REQUEST;
$columns = ['id', 'course_name', 'num_students'];

$sql = "SELECT * FROM courses";
$result = $conn->query($sql);
$totalData = $result->num_rows;

$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = [
        $row['id'],
        $row['name_lengkap'],
        $row['nomor_telp'],
        '<button class="btn btn-warning btn-sm">Edit</button>',
        '<button class="btn btn-danger btn-sm">Delete</button>'
    ];
}

$json_data = [
    "draw" => intval($request['draw']),
    "recordsTotal" => $totalData,
    "recordsFiltered" => $totalData,
    "data" => $data
];

echo json_encode($json_data);
?>
