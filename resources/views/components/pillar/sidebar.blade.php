<table>
    <tbody>
    <tr>
        <td class="info-section">
            @if (is_string($cv->picture) && file_exists(public_path('storage/cv/pictures/' . $cv->picture)))
                <img src="{{ public_path('storage/cv/pictures/' . $cv->picture) }}" alt="Picture" />
                <br><br>
            @endif
        </td>
    </tr>
    <tr>
        <th class="sidebar-title">{{ __('pdf-sections.profile') }}</th>
    </tr>
    @if ($cv->email)
        <tr>
            <td>{{ $cv->email }}</td>
        </tr>
    @endif
    @if ($cv->phone)
        <tr>
            <td>{{ $cv->phone }}</td>
        </tr>
    @endif
    @if ($cv->address)
        <tr>
            <td>{{ $cv->address }}</td>
        </tr>
    @endif
    @if ($cv->city)
        <tr>
            <td>{{ $cv->city }}</td>
        </tr>
    @endif
    @if ($cv->birth_date)
        <tr>
            <td>{{ $cv->birth_date }}</td>
        </tr>
    @endif
    @if ($cv->marital_status)
        <tr>
            <td>{{ $cv->marital_status }}</td>
        </tr>
    @endif
    @if ($cv->nationality)
        <tr>
            <td>{{ $cv->nationality }}</td>
        </tr>
    @endif
    </tbody>
</table>
@if ($cv->language || isset($cv->languages))
    <table >
        <thead>
        <tr>
            <th class="sidebar-title">{{ $cv->langs_section_title ?? __('pdf-sections.languages') }}</th>
        </tr>
        </thead>
        <tbody>
        @isset($cv->language)
            <tr>
                <td scope="col">
                    {{ $cv->language }} {{ $cv->level ?? '' }}
                </td>
            </tr>
        @endisset
        @isset($cv->languages)
            @foreach ($cv->languages as $language)
                <tr>
                    <td>
                        {{ $language['language'] }} {{ $language['level'] ?? '' }}
                    </td>
                </tr>
            @endforeach
        @endisset
        </tbody>
    </table>
@endif

@if ($cv->skill || isset($cv->skills))
    <table >
        <thead>
        <tr>
            <th class="sidebar-title">{{ $cv->skills_section_title ?? __('pdf-sections.skills') }}</th>
        </tr>
        </thead>
        <tbody>
        @isset($cv->skill)
            <tr>
                <td>{{ $cv->skill }}</td>
            </tr>
        @endisset
        @isset($cv->skills)
            @foreach ($cv->skills as $skill)
                <tr>
                    <td>{{ $skill['skill'] }}</td>
                </tr>
            @endforeach
        @endisset
        </tbody>
    </table>
@endif

@isset($cv->interests)
    <table>
        <thead>
        <tr>
            <th class="sidebar-title">{{ $cv->interests_section_title ?? __('pdf-sections.interests') }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($cv->interests as $interest)
            <tr>
                <td>{{ $interest['interest'] }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endisset

@isset($cv->cert)
    <table>
        <thead>
        <tr>
            <th class="sidebar-title">{{ $cv->certs_section_title ?? __('pdf-sections.certs') }}</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>{{ $cv->cert }}</td>
        </tr>
        </tbody>
    </table>
@endisset

@isset($cv->ref)
    <table>
        <thead>
        <tr>
            <th class="sidebar-title">{{ $cv->refs_section_title ?? __('pdf-sections.certs') }}</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>{{ $cv->ref }}</td>
        </tr>
        </tbody>
    </table>
@endisset
