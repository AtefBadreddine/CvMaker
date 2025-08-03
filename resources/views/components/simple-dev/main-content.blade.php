<table >
    <thead>
    <tr>
        <th class="section-title" style="font-size:40px;padding-bottom:0">{{$cv->name ?? ""}}</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td style="padding-top:5px">{{$cv->current_job ?? ""}}</td>
    </tr>
    </tbody>
</table>
@if($cv->profession_summary)
    <table >
        <tbody>
        <tr>
            <td><div class="details" style="text-align: justify !important">{!!str_replace("\n","<br/>",$cv->profession_summary ?? "")!!}</div></td>
        </tr>
        </tbody>
    </table>
@endif

@if($cv->jobs)
    <table >
        <thead>
        <tr>
            <th scope="col" class="section-title">{{$cv->jobs_section_title ?? __('pdf-sections.experiences')}}</th>
        </tr>
        </thead>
        <tbody>
        @isset($cv->jobs)
            @foreach ($cv->jobs as  $job)
                <tr>
                    <td scope="col" style="padding-bottom:0"><strong><span class="title">{{$job['job_title'] ?? ""}}</span> </strong> {{isset($job['employer']) ? '| '.$job['employer'] : ""}}</td>
                </tr>
                <tr>
                    <td style="padding-bottom:0;padding-top:5px"><span>{{$job['jobStartYear'] ?? ""}}{{isset($job['jobEndYear']) ? ' - '.$job['jobEndYear'] : ""}}{{isset($job['job_city']) ? ' | '.$job['job_city'] : ""}}</span></td>
                </tr>
                <tr>
                    <td style="padding-top:5px"><p class="details">{!!str_replace("\n","<br/>",$job['details'] ?? "")!!}</p></td>
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
            <th scope="col" class="section-title">{{$cv->education_section_title ?? __('pdf-sections.education')}}</th>
        </tr>
        </thead>
        <tbody>
        @isset($cv->educations)
            @foreach ($cv->educations as  $education)
                <tr>
                    <td style="padding-bottom:0"><strong class="title">{{$education['university'] ?? ""}}{{isset($education['education_city']) ? ', '.$education['education_city'] : ""}}</strong>, </td>
                </tr>
                <tr>
                    <td style="padding-bottom:0;padding-top:5px">{{$education['degree'] ?? ""}}{{isset($education['endYear']) ? ', '.$education['endYear'] : ""}}</td>
                </tr>
                <tr>
                    <td style="padding-top:10px"><p class="details">{!!str_replace("\n","<br/>",$education['details'] ?? "")!!}</p></td>
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
                <th scope="col" class="section-title" style="padding-bottom:20px;padding-top:20px">{{$section['customSectionTitle'] ?? ""}}</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td style="padding-top:0">
                    <p>{!!str_replace("\n","<br/>",$section['customSectionDetails'] ?? "")!!}</p>
                </td>
            </tr>
            </tbody>
        </table>
    @endforeach
@endisset
