<x-mail::message>
# New Inquiry Received

You have received a new inquiry from **{{ $data['fullname'] }}**.

**Email:** {{ $data['email'] }}
**Phone:** {{ $data['phone'] }}
**People:** {{ $data['people'] }}
**Date:** {{ $data['date'] }}
**Message:**
{{ $data['message'] ?? 'No message provided.' }}

<x-mail::button :url="route('tours.index')">
View Tours
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
