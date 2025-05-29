<p>Congrats we are offering you a job</p>
<h1>{{ $job->title }}</h1>

<p>
    click here
    <a href="{{ url(route('jobs.show', ['job' => $job->id])) }}">link</a>
</p>
