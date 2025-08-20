<?php
namespace App\Imports;

use App\Models\PertanyaanKelengkapan;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class QuestionsImport implements ToModel, WithHeadingRow
{
    private $rowCount = 0;
    private $successCount = 0;
    private $failedCount = 0;
    private $errors = [];

    public function model(array $row)
    {
        $this->rowCount++;

        try {
            PertanyaanKelengkapan::create([
                'question'  => $row[0],
                'id_parent' => $row[1] ?? null,
                'order'     => $row[2] ?? null,
            ]);

            $this->successCount++;
        } catch (\Exception $e) {
            $this->failedCount++;
            $this->errors[] = "Row {$this->rowCount}: {$e->getMessage()}";
        }
    }

    public function getRowCount() { return $this->rowCount; }
    public function getSuccessCount() { return $this->successCount; }
    public function getFailedCount() { return $this->failedCount; }
    public function getErrors() { return $this->errors; }
}