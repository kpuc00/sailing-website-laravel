<div class="card  my-2 mx-auto" style="width: 18rem;">
    <img class="card-img-top" src="storage/article-img/" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">{{ $article->title }}</h5>
      <p class="card-text">{{ Substr($article->content, 0, strlen($article->content) - 50). '...' }}</p>
      <a href="/article/{{ $article->id }}" class="btn btn-primary">View full article</a>
    </div>
</div>
