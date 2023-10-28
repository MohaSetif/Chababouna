<h4>{{ Auth::user()->name }}</h4>
<div class="mb-3">
    <!-- QR code for Combined Data (ID and Email) -->
    @php
        $data = json_decode($combinedData, true);
        $userName = isset($data['id']) ? $data['id'] : 'Unknown';
    @endphp

    <a href="data:image/png;base64,{!! base64_encode(QrCode::format('png')->size(200)->generate($combinedData)) !!}" download="{{ $userName }}.png">
        <img src="data:image/png;base64,{!! base64_encode(QrCode::format('png')->size(200)->generate($combinedData)) !!}">
    </a>
</div>
