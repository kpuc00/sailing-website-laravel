<div class="card  my-2 mx-auto" style="width: 18rem;">
    <img class="card-img-top" src="storage/course-img/" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">{{ $course->name }}</h5>
      <p class="card-text">{{ Substr($course->description, 0, strlen($course->description) - 50). '...' }}</p>
      <a href="/course/{{ $course->id }}" class="btn btn-primary">View full article</a>
    </div>
</div>
