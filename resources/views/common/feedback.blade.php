@if (!empty($successMsg) )
    <div class="alert alert-success">
        <strong>Gefeliciteerd Apptiter! Volgende wijzigingen werden succesvol aangepast.</strong>

        <br><br>
        <ul>
            @foreach ($successMsg->all() as $message)
                <li>{{ $message }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (count($errorMsg) > 0)
    <div class="alert alert-danger">
        <strong>Opgepast Apptiter! Er ging iets fout.</strong>

        <br><br>
        <ul>
            @foreach ($errorMsg->all() as $message)
                <li>{{ $message }}</li>
            @endforeach
        </ul>
    </div>
@endif