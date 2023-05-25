<h1>Listagem dos Suportes</h1>

<a href="{{route('supports.create')}}">New FAQ</a>

<table>
  <thead>
    <th>Subject</th>
    <th>Status</th>
    <th>Description</th>
    <th></th>
  </thead>

  <tbody>
    @foreach($supports as $support)
    <tr>
      <td>{{$support-> subject}}</td>
      <td>{{$support-> status}}</td>
      <td>{{$support-> body}}</td>
      <td>
        <a href="{{route('supports.show', $support->id)}}">Go</a>
        <a href="{{route('supports.edit', $support->id)}}">Edit</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>