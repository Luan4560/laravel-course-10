<h1>Doubt details {{ $support->id }}</h1>

<ul>
  <li>Subject: {{ $support->subject }}</li>
  <li>Status: {{ $support->status }}</li>
  <li>Description: {{ $support->body }}</li>
</ul>

<form action="{{ route('supports.destroy', $support->id) }}" method="post">
  @csrf()
  @method('DELETE')
  <button type="submit">Delete</button>
</form>