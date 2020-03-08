<?php

namespace App\Exceptions;

class BuildExceptions extends \RuntimeException
{
    protected $shortMessage;
    protected $message;
    protected $code;
    protected $description;
    protected $status = 200;

    public static function make(): BuildExceptions
    {
        return new self();
    }

    public function render()
    {
        return response()->json($this->toArray(), $this->status);
    }

    public function setShortMessage(string $shortMessage = null): BuildExceptions
    {
        $this->shortMessage = $shortMessage;
        $this->code         = $shortMessage;
        return $this;
    }

    public function setMessage(string $message = null): BuildExceptions
    {
        $this->message = $message;
        return $this;
    }

    public function setDescription(string $description = null): BuildExceptions
    {
        $this->description = $description;
        return $this;
    }

    public function setStatus(int $status): BuildExceptions
    {
        $this->status = $status;
        return $this;
    }

    protected function toArray(): array
    {
        return array_filter([
            'shortMessage' => $this->shortMessage,
            'message'      => $this->message,
            'description'  => $this->description
        ]);
    }
}
