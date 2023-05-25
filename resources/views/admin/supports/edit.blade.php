<h1>Doubt {{ $support->id }}</h1>

<form action="{{route('supports.update', $support->id)}}" method="POST">
  @csrf()
  @method('PUT')
  <input type="text" placeholder="Subject" name="subject" value="{{ $support->subject }}">
  <textarea name="body" cols="30" rows="5" placeholder="Description">{{ $support->body }}</textarea>
  <button type="submit">Send</button>
</form>