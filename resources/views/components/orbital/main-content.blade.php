@if($cv->profession_summary)
    <table >
        <thead>
        <tr>
            <th class="section-title">{{$cv->summary_section_title ?? __('pdf-sections.summary')}}</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><div class="details" style="text-align: justify !important">{!!str_replace("\n","<br/>",$cv->profession_summary)!!}</div></td>
        </tr>
        </tbody>
    </table>
@endif

@if($cv->jobs)
    <table >
        <thead>
        <tr>
            <th scope="col" colspan="2" class="section-title">{{$cv->jobs_section_title ?? __('pdf-sections.experiences')}}</th>
        </tr>
        </thead>
        <tbody>

        @isset($cv->jobs)
            @foreach ($cv->jobs as  $job)
                <tr>
                    <td style="width: 20%" class="gray-text" style="vertical-align: top">{{$job['jobStartYear'] ?? ""}}{{isset($job['jobEndYear']) ? ' - ' . $job['jobEndYear'] : ""}}</td>
                    <td scope="col" style="width: 75%">
                        <span class="title">{{$job['job_title'] ?? ""}}</span>
                        <br>
                        <br>
                        <span class="gray-text">{{$job['employer']  ?? ""}}{{isset($job['job_city']) ? ', '. $job['job_city'] : ""}}</span>
                        <p class="details">{!!str_replace("\n","<br/>",$job['details'] ?? "")!!}</p>
                    </td>
                </tr>
            @endforeach
        @endisset
        </tbody>
    </table>
@endif

@if($cv->educations)
    <table >
        <thead>
        <tr>
            <th scope="col" colspan="2" class="section-title">{{$cv->education_section_title ?? __('pdf-sections.education')}}</th>
        </tr>
        </thead>
        <tbody>

        @isset($cv->educations)
            @foreach ($cv->educations as  $education)
                <tr>
                    <td style="width: 35%" class="gray-text" style="vertical-align: top">{{$education['startYear'] ?? ""}} <br/> {{isset($education['endYear']) ? ' - ' . $education['endYear'] : ""}}</td>
                    <td scope="col" style="width:65%">
                        <strong class="title">{{$education['degree'] ?? ""}}</strong>
                        <br>
                        <br>
                        {{$education['university'] ?? ""}} {{isset($education['education_city']) ? ', '.$education['education_city'] : ""}}
                        <p class="details" style="padding-top:5px">{!!str_replace("\n","<br/>",$education['details'] ?? "")!!}</p>
                    </td>
                </tr>
            @endforeach
        @endisset
        </tbody>
    </table>
@endif

@isset($cv->customSections)
    @foreach ($cv->customSections as $section)
        <table >
            <thead>
            <tr>
                <th scope="col" class="section-title">{{$section['customSectionTitle'] ?? ""}}</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>
                    <p>{!!str_replace("\n","<br/>",$section['customSectionDetails'] ?? "")!!}</p>
                </td>
            </tr>
            </tbody>
        </table>
    @endforeach
@endisset
