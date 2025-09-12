<x-mail::message>
Contact Message

<p>Name: {{ $contact->name }}</p>
<p>Email: {{ $contact->email }}</p>
<p>Subject: {{ $contact->subject }}</p>
<p>Message: {{ $contact->message }}</p>

<x-mail::button :url="''">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
