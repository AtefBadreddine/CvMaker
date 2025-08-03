@php
    $currentLocale = session()->get('selectedLang') ?? ($cv->selectedLang ?? 'en');
@endphp
<!doctype html>
<html lang="{{$currentLocale}}" dir="{{$currentLocale == 'ar' ? 'rtl' : 'ltr'}}">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <style>
        table {
            border-spacing: 1;
            border-collapse: collapse;
            background: white;
            overflow: hidden;
            max-width: 800px;
            width: 100%;
            margin: 0 auto;
            position: relative;
        }

        table * {
            position: relative;
        }

        th {
            background: {{$cv->lighter_color ?? '#deeaf6'}};
            font-size: {{$cv->cv_text_size ?? '18'}}px;
            font-family:'Cairo';
            padding:5px 0;
        }

        td,
        th {
            border: none
        }

        td
        {
            font-family:'Cairo';
            font-size: {{$cv->cv_text_size - 2 ?? '16'}}px;
            padding: 5px;
        }

        .multirows td
        {
            padding: 10px
        }

        .multirows td.lastrow
        {
            padding-bottom: 20px;
        }

        td.subtitle,
        .multirows td.subtitle
        {
            font-weight: bold;
            font-size: {{$cv->cv_text_size - 1 ?? '17'}}px;
        }

        .multirows td.subtitle
        {
            padding-top: 20px
        }

        body {
            background: #fff;
            font: {{$cv->cv_text_size - 2 ?? '16'}}px "Cairo", "Arial";
            padding: 20px;
         	 margin:10px;
        }

      	.name
        {
            font-size: 40px;
            font-family:'Cairo';
            text-align: center;
            font-weight: bold;
            margin: 0;
            padding: 0
        }

        p
        {
            font-family:'Cairo';
          font-size:{{$cv->cv_text_size - 2 ?? '16'}}px;
        }

        .text-center
        {
            text-align: center
        }

        .text-justify
        {
            text-align: justify;
        }

        hr
        {
            margin: 0;
            padding: 0
        }

    </style>
    <title>{{$cv->name ?? ""}}</title>
</head>

<body>
  	<p style="padding:5px 0 10px 0;margin:0;line-height: 1.2;" class="text-center">
      <span class="name">{{$cv->name ?? ""}}</span>
      <br />
      {{$cv->current_job ?? ""}}</p>
    <hr />
    <p style="padding:0;margin:0;text-align:center" class="text-center;" dir="ltr">
      @if ($cv->phone){{ $cv->phone ?? "" }} @endif
      @if ($cv->email) | {{ $cv->email ?? "" }} @endif
      @if ($cv->marital_status) | {{$cv->marital_status ?? ""}} @endif
      @if ($cv->address) | {{ $cv->address ?? "" . $cv->city ?? "" }} @endif
      @if ($cv->birth_date) | {{ $cv->birth_date ?? "" }} @endif
  	</p>
    @if($cv->profession_summary)
  	<table>
        <thead>
            <tr>
                <th>{{$cv->summary_section_title ?? __('pdf-sections.summary')}}</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="text-justify" style="padding:20px 5px;">{!!str_replace("\n","<br/>",$cv->profession_summary)!!}</td>
            </tr>
        </tbody>
    </table>
  	@endif

  	@if($cv->jobs)
    <table>
        <thead>
            <tr>
                <th colspan="2">{{$cv->jobs_section_title ?? __('pdf-sections.experiences')}}</th>
            </tr>
        </thead>
        <tbody class="multirows">
          @foreach ($cv->jobs as  $job)
            <tr>
                <td class="subtitle">{{$job['job_title'] ?? ""}}</td>
                <td rowspan="3" style="vertical-align: text-top;text-align: left;width: 15%;padding-top:20px">{{$job['jobStartYear'] ?? ""}} - {{$job['jobEndYear'] ?? ""}}</td>
            </tr>
            <tr>
                <td>{{$job['employer'] ?? ""}}{{isset($job['job_city']) ? ', '.$job['job_city'] : ""}}</td>
            </tr>
            <tr>
                <td class="lastrow">{!!str_replace("\n","<br/>",$job['details'] ?? "")!!}</td>
            </tr>
          @endforeach
        </tbody>
    </table>
  	@endif

  	@if($cv->educations)
    <table>
        <thead>
            <tr>
                <th colspan="2">{{$cv->education_section_title ?? __('pdf-sections.education')}}</th>
            </tr>
        </thead>
        <tbody class="multirows">
          @foreach ($cv->educations as  $education)
            <tr>
                <td class="subtitle">{{$education['degree'] ?? ""}}</td>
                <td rowspan="1" style="vertical-align: text-top;text-align: left;width: 15%;padding-top:20px">{{$education['startYear'] ?? ""}} - {{$education['endYear'] ?? ""}}</td>
            </tr>
            <tr>
                <td>{{$education['university'] ?? ""}}{{isset($education['education_city']) ? ', '.$education['education_city'] : ""}}</td>
            </tr>
          	<tr>
                <td colspan="2" class="lastrow">{!!str_replace("\n","<br/>",$education['details'] ?? "")!!}</td>
            </tr>
          @endforeach
        </tbody>
    </table>
  	@endif

  	@if ($cv->language || isset($cv->languages))
    <table>
        <thead>
            <tr>
                <th colspan="2">{{ $cv->langs_section_title ?? __('pdf-sections.languages') }}</th>
            </tr>
        </thead>
        <tbody>
          @isset($cv->language)
            <tr>
                <td class="subtitle" style="width: 15%">{{ $cv->language }}</td>
                <td>{{ $cv->level ?? '' }}</td>
            </tr>
          @endisset
          	@isset($cv->languages)
            	@foreach ($cv->languages as $language)
                    <tr>
                      <td class="subtitle" style="width: 15%">{{ $language['language'] }}</td>
                      <td>{{ $language['level'] ?? '' }}</td>
                    </tr>
          		@endforeach
          	@endisset
        </tbody>
    </table>
  	@endif

  	@if ($cv->skill || isset($cv->skills))
    <table>
        <thead>
            <tr>
                <th>{{ $cv->skills_section_title ?? __('pdf-sections.skills') }}</th>
            </tr>
        </thead>
        <tbody>
            <tr>

                <td class="subtitle">{{ $cv->skill ?? "" }}
                  @isset($cv->skills)
                    @foreach ($cv->skills as $skill)
                  		, {{ $skill['skill'] }}
                  	@endforeach
                  @endisset

              </td>
            </tr>
          <tr><td class="lastrow"></td></tr>
        </tbody>
    </table>
  	@endif

  	@if ($cv->interests)
    <table>
        <thead>
            <tr>
                <th>{{ $cv->interests_section_title ?? __('pdf-sections.interests') }}</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="subtitle">
                    @foreach ($cv->interests as $interest)
                  		{{ $interest['interest'] }},
                  	@endforeach
              </td>
            </tr>
          	<tr><td class="lastrow"></td></tr>
        </tbody>
    </table>
  	@endif

    @isset($cv->cert)
        <table>
            <thead>
            <tr>
                <th>{{ $cv->certs_section_title ?? __('pdf-sections.certs') }}</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="subtitle">{{ $cv->cert }}</td>
            </tr>
            <tr><td class="lastrow"></td></tr>
            </tbody>
        </table>
    @endisset

    @isset($cv->ref)
        <table>
            <thead>
            <tr>
                <th>{{ $cv->refs_section_title ?? __('pdf-sections.certs') }}</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="subtitle">{{ $cv->ref }}</td>
            </tr>
            <tr><td class="lastrow"></td></tr>
            </tbody>
        </table>
    @endisset


  	@isset($cv->customSections)
    	@foreach ($cv->customSections as $section)
          <table>
              <thead>
                  <tr>
                      <th>{{$section['customSectionTitle'] ?? ""}}</th>
                  </tr>
              </thead>
              <tbody>
                  <tr>
                      <td class="lastrow">
                          <p>{!!str_replace("\n","<br/>",$section['customSectionDetails'] ?? "")!!}</p>
                    </td>
                  </tr>
              </tbody>
          </table>
  		@endforeach
    @endisset
</body>

</html>
