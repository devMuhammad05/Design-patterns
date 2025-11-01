class Mail:
    def __init__(self, to, cc=None, bcc=None, subject=None, body=None):
        self.to = to
        self.cc = cc or []
        self.bcc = bcc or []
        self.subject = subject
        self.body = body

    def send(self):
        print("Sending email...")
        print("To:", ", ".join(self.to))
        print("CC:", ", ".join(self.cc))
        print("BCC:", ", ".join(self.bcc))
        print("Subject:", self.subject)
        print("Body:", self.body)
        print("Email sent successfully!")


class MailBuilder:
    def __init__(self, to: list):
        self._to = to
        self._cc = []
        self._bcc = []
        self._subject = None
        self._body = None

    def add_cc(self, email: str):
        self._cc.append(email)
        return self

    def add_bcc(self, email: str):
        self._bcc.append(email)
        return self

    def set_subject(self, subject: str):
        self._subject = subject
        return self

    def set_body(self, body: str):
        self._body = body
        return self

    def build(self) -> Mail:
        return Mail(
            to=self._to,
            cc=self._cc,
            bcc=self._bcc,
            subject=self._subject,
            body=self._body,
        )


# Example usage
email = (
    MailBuilder(["adelekeyahaya05@gmail.com"])
    .add_cc("y.adeleke05@gmail.com")
    .add_bcc("y.adeleke05@gmail.com")
    .set_subject("CEO position")
    .set_body("I'm writing not to request but to notify that the CEO position....")
    .build()
)

email.send()
