<x-mail::message>
# New Contact Inquiry

<div style="text-align: center; margin-bottom: 30px;">
    <img src="{{ asset('imgs/logo.png') }}" alt="AMI Logo" style="max-width: 200px; height: auto;">
</div>

You have received a new contact inquiry from your website.

## Contact Details

**Name:** {{ $contact->name }}

**Email:** {{ $contact->email }}

**Phone:** {{ $contact->phone }}

## Message

{{ $contact->message }}

---

<x-mail::button :url="'mailto:' . $contact->email">
Reply to Customer
</x-mail::button>

Best regards,<br>
{{ config('app.name') }} Website
</x-mail::message>
