<div style="height: 100%">
    <table style="border-bottom: 4px double #222; width:95%">
        <tbody>
        <tr>
            <td>
                <strong class="name">{{$cv->name ?? ""}}</strong>
                <br>
                <strong>{{$cv->current_job ?? ""}}</strong>
            </td>
        </tr>
        </tbody>
    </table>

    @if($cv->profession_summary)
        <table style="width:95%;">
            <tbody>
            <tr>
                <td><p style="text-align: justify">{!!str_replace("\n","<br/>",$cv->profession_summary)!!}</p></td>
            </tr>
            </tbody>
        </table>
    @endif

    @if($cv->jobs)
        <table style="width:95%;">
            <thead>
            <tr>
                <th scope="col" class="section-title">{{$cv->jobs_section_title ?? __('pdf-sections.experiences')}}</th>
            </tr>
            </thead>
            <tbody>

            @isset($cv->jobs)
                @foreach ($cv->jobs as  $job)
                    <tr>
                        <th style="padding-bottom: 5px">{{$job['job_title'] ?? ""}} {{isset($job['employer']) ? ', '.$job['employer'] : ""}}</th>
                    </tr>
                    <tr>
                        <td scope="col" style="padding-top: 0">
                            {{isset($job['job_city']) ? $job['job_city'] . ' , ' : ""}}{{isset($job['jobStartYear']) ? $job['jobStartYear'] . ' - ' : ""}}{{$job['jobEndYear'] ?? ""}}
                            <p style="padding-top: 5px">{!!str_replace("\n","<br/>",$job['details'] ?? "")!!}</p>
                        </td>
                    </tr>
                @endforeach
            @endisset
            </tbody>
        </table>
    @endif

    @if($cv->educations)
        <table style="width:95%;">
            <thead>
            <tr>
                <th scope="col" class="section-title">{{$cv->education_section_title ?? __('pdf-sections.education')}}</th>
            </tr>
            </thead>
            <tbody>

            @isset($cv->educations)
                @foreach ($cv->educations as  $education)
                    <tr>
                        <td scope="col">
                            <strong class="title">{{$education['degree'] ?? ""}}{{isset($education['university']) ? ', '.$education['university'] : ""}}</strong>
                            <br>
                            {{isset($education['education_city']) ? $education['education_city'] . ' , ' : ""}}{{isset($education['startYear']) ? $education['startYear'] . ' - ' : ""}}{{$education['endYear'] ?? ""}}
                            <p style="padding-top: 5px">{!!str_replace("\n","<br/>",$education['details'] ?? "")!!}</p>
                        </td>
                    </tr>
                @endforeach
            @endisset
            </tbody>
        </table>
    @endif

    @isset($cv->customSections)
        @foreach ($cv->customSections as $section)
            <table style="width:95%;">
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

</div>
