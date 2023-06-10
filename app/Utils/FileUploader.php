<?php


namespace App\Utils;


class File
{
    private ?string $name;
    private ?string $full_path;
    private ?string $type;
    private ?string $tmp_name;
    private ?int $error;
    private ?int $size;

    public function __construct($file)
    {
        $this->name = $file["name"] ?? null;
        $this->full_path = $file["full_path"] ?? null;
        $this->type = $file["type"] ?? null;
        $this->tmp_name = $file["tmp_name"] ?? null;
        $this->error = $file["error"] ?? null;
        $this->size = $file["size"] ?? null;

        // echo json_encode($file);
    }

    public function checkFileType(array $types): bool
    {

        ;
        return in_array($this->getType(), $types);
    }
    public function getName(): ?string
    {
        return $this->name;
    }
    public function getFullPath(): ?string
    {
        return $this->full_path;
    }
    public function getType(): ?string
    {
        $type_arr = explode('/', $this->type);
        return end($type_arr);
    }
    public function getTmpName(): ?string
    {
        return $this->tmp_name;
    }
    public function getError(): ?int
    {
        return $this->error;
    }
    public function getSize(): ?int
    {
        return $this->size;
    }


}

class FileUploader
{
    /**
     * @return string $filename
     */
    public function uploadOne($file, ?array $allowedTypes = null, int $maxSize = null): string
    {
        $file = new File($file);

        if ($allowedTypes && !$file->checkFileType($allowedTypes)) {
            throw new \Exception("File type not allowed, allowed types: " . implode(", ", $allowedTypes));
        }
        if ($maxSize && !($file->getSize() > $maxSize)) {
            throw new \Exception("File size not allowed, max size: " . $maxSize);
        }

        // uplaod the file

        $storage = trim(Config::get('file_system')['storage'], '/') . '/';
        $image_name = microtime(true) . uniqid("_", true) . "_" . $file->getName();

        $full_path = rootDir($storage . "/$image_name");

        if (!is_dir($storage)) {
            mkdir($storage, 777, true);
        }

        move_uploaded_file($file->getTmpName(), $full_path);

        return $image_name;
    }
}