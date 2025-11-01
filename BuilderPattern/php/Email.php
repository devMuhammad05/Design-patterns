<?php

class Mail
{
    public function __construct(
        public array $to,
        public array $cc = [],
        public ?array $bcc = [],
        public ?string $subject = null,
        public ?string $body = null,
    ) {}


    public function send(): void
    {
        echo "Sending email...\n";
        echo "To: " . implode(', ', $this->to) . "\n";
        echo "CC: " . implode(', ', $this->cc) . "\n";
        echo "BCC: " . implode(', ', $this->bcc) . "\n";
        echo "Subject: {$this->subject}\n";
        echo "Body: {$this->body}\n";
        echo "Email sent successfully!\n";
    }
}


class MailBuilder
{
    private array $to = [];
    private array $cc = [];
    private array $bcc = [];
    private ?string $subject = null;
    private ?string $body = null;

    private Mail $mail;

    public function __construct(array $to)
    {
        $this->to = $to;
    }

    public function addCc(string $email): self
    {
        $this->cc[] = $email;
        return $this;
    }

    public function addBcc(string $email): self
    {
        $this->bcc[] = $email;
        return $this;
    }

    public function setSubject(string $subject): self
    {
        $this->subject = $subject;
        return $this;
    }

    public function setBody(string $body): self
    {
        $this->body = $body;
        return $this;
    }

    public function build(): Mail
    {
        return new Mail($this->to, $this->cc, $this->bcc, $this->subject, $this->body);
    }
}

$email = (new MailBuilder(["adelekeyahaya05@gmail.com"]))
            ->addCc("y.adeleke05@gmail.com")
            ->addBcc("y.adeleke05@gmail.com")
            ->setSubject("CEO position")
            ->setBody("I'm writing, not to request but to notify that the CEO position....")
            ->build();

$email->send();