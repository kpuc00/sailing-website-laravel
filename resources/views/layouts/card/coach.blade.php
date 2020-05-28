<div class="card  my-2 mx-auto" style="width: 18rem;">
    <img class="card-img-top" src="storage/coach-img/" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">{{ $coach->firstName . " " . $coach->lastName }}</h5>
      <p class="card-text">{{ Substr($coach->description, 0, strlen($coach->description) - 50). '...' }}</p>
      <a href="/course/{{ $course->id }}" class="btn btn-primary">View full article</a>
    </div>
</div>
