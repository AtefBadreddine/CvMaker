<table class="personal-info-table">
    <tbody>
    @if (is_string($cv->picture) && file_exists(public_path('storage/cv/pictures/' . $cv->picture)))
        <tr>
            <td style="text-align: center; padding-top:30px">
                <img class="profile mb-2" src="{{ public_path('storage/cv/pictures/' . $cv->picture) }}" alt="Picture" />
            </td>
        </tr>
    @endif

    @if ($cv->email)
        <tr>
            <th>{{ __('labels.email') }}</th>
        </tr>
        <tr>
            <td>{{ $cv->email }}</td>
        </tr>
    @endif
    @if ($cv->phone)
        <tr>
            <th>{{ __('labels.phone') }}</th>
        </tr>
        <tr>
            <td>{{ $cv->phone }}</td>
        </tr>
    @endif
    @if ($cv->address)
        <tr>
            <th>{{ __('labels.address') }}</th>
        </tr>
        <tr>
            <td>{{ $cv->address }}</td>
        </tr>
    @endif
    @if ($cv->city)
        <tr>
            <th>{{ __('labels.city') }}</th>
        </tr>
        <tr>
            <td>{{ $cv->city }}</td>
        </tr>
    @endif
    @if ($cv->birth_date)
        <tr>
            <th>{{ __('labels.birth_date') }}</th>
        </tr>
        <tr>
            <td>{{ $cv->birth_date }}</td>
        </tr>
    @endif
    @if ($cv->marital_status)
        <tr>
            <th>{{ __('labels.marital_status') }}</th>
        </tr>
        <tr>
            <td>{{ $cv->marital_status }}</td>
        </tr>
    @endif
    @if ($cv->nationality)
        <tr>
            <th>{{ __('labels.nationality') }}</th>
        </tr>
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
            <th colspan="2" class="title">{{ $cv->langs_section_title ?? __('pdf-sections.languages') }}</th>
        </tr>
        </thead>
        <tbody>
        @isset($cv->language)
            <tr>
                <th scope="col" style="font-weight: 300">{{ $cv->language }}</th>
                <td>{{ $cv->level ?? '' }}</td>
            </tr>
        @endisset
        @isset($cv->languages)
            @foreach ($cv->languages as $language)
                <tr>
                    <th style="font-weight: 300">{{ $language['language'] }}</th>
                    <td>{{ $language['level'] ?? '' }}</td>
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
            <th class="title">{{ $cv->skills_section_title ?? __('pdf-sections.skills') }}</th>
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
            <th class="title">{{ $cv->interests_section_title ?? __('pdf-sections.interests') }}</th>
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
            <th class="title">{{ $cv->certs_section_title ?? __('pdf-sections.certs') }}</th>
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
            <th class="title">{{ $cv->refs_section_title ?? __('pdf-sections.certs') }}</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>{{ $cv->ref }}</td>
        </tr>
        </tbody>
    </table>
@endisset
