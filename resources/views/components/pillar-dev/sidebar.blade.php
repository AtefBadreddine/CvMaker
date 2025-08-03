<table>
    <tbody>
    <tr>
        <th class="sidebar-title" style="font-size:20px; padding: 30px 10px">{{ __('pdf-sections.profile') }}</th>
    </tr>
    @if ($cv->email)
        <tr>
            <th class="info-sidebar-title">{{ __('labels.email') }}</th>
        </tr>
        <tr>
            <td class="info-sidebar-data">{{ $cv->email }}</td>
        </tr>
    @endif
    @if ($cv->phone)
        <tr>
            <th class="info-sidebar-title">{{ __('labels.phone') }}</th>
        </tr>
        <tr>
            <td class="info-sidebar-data">{{ $cv->phone }}</td>
        </tr>
    @endif
    @if ($cv->address)
        <tr>
            <th class="info-sidebar-title">{{ __('labels.address') }}</th>
        </tr>
        <tr>
            <td class="info-sidebar-data">{{ $cv->address }}</td>
        </tr>
    @endif
    @if ($cv->city)
        <tr>
            <th class="info-sidebar-title">{{ __('labels.city') }}</th>
        </tr>
        <tr>
            <td class="info-sidebar-data">{{ $cv->city }}</td>
        </tr>
    @endif
    @if ($cv->birth_date)
        <tr>
            <th class="info-sidebar-title">{{ __('labels.birth_date') }}</th>
        </tr>
        <tr>
            <td class="info-sidebar-data">{{ $cv->birth_date }}</td>
        </tr>
    @endif
    @if ($cv->marital_status)
        <tr>
            <th class="info-sidebar-title">{{ __('labels.marital_status') }}</th>
        </tr>
        <tr>
            <td class="info-sidebar-data">{{ $cv->marital_status }}</td>
        </tr>
    @endif
    @if ($cv->nationality)
        <tr>
            <th class="info-sidebar-title">{{ __('labels.nationality') }}</th>
        </tr>
        <tr>
            <td class="info-sidebar-data">{{ $cv->nationality }}</td>
        </tr>
    @endif
    </tbody>
</table>
@if ($cv->language || isset($cv->languages))
    <table >
        <thead>
        <tr>
            <th class="sidebar-title">{{$cv->langs_section_title ??  __('pdf-sections.languages') }}</th>
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
