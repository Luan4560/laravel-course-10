<h1>New Support</h1>

<form action="{{route('supports.store')}}" method="POST">
  @csrf()
  <input type="text" placeholder="Subject" name="subject">
  <textarea name="body" cols="30" rows="5" placeholder="Description"></textarea>
  <button type="submit">Send</button>
</form>