<x-sidebarPanel>

<link rel="stylesheet" href="{{ asset('css/app.css') }}">

<div class="container mt-5" style="border:solid; padding-bottom: 30px;">
  <div class="row d-flex justify-content-center">
		<div class="col-12">
			<p class="mt-5 text-center" style="font-size: xx-large; font-weight: bold;">
				PROPOSED TITLE LIST
			</p>
      @if (session('status'))
          <div class="alert alert-success text-center">
              {{ session('status') }}
          </div>
      @endif
      <table class="w3-table w3-hoverable mt-3">
        <thead>
          <tr class="w3-grey w3-border">
            <th>Title Name</th>
            <th>Year/Session</th>
            <th>Comments</th>
            <th>Status</th>
            <th>Details</th>
          </tr>
        </thead>
        @foreach($panelform as $email)
        <?php   $title = $titleinfos->where('id',$email->titleid)->first();?>
        <tr class="w3-border">
          <td>{{ $title->title }}</td>
          <td>Session {{ $title->session }} of <span id="{{ $title->id }}">{{ $title->created_at->format('Y') }}</span>/<span id="nani{{$title->id }}"></span></td>
          <script>

          var tahun1 =parseInt(document.getElementById("{{ $title->id }}").innerHTML);
          var tahun2;
          if ({{ $title->session }}==1) {
            tahun2 = tahun1 + 1;
          } else {
            tahun2 = tahun1;
            tahun1 = tahun1 - 1;
          }
          document.getElementById("{{  $title->id }}").innerHTML = tahun1;
          document.getElementById("nani{{  $title->id }}").innerHTML = tahun2;
          </script>
          <td>
            @if (empty($title->comment))
            <p>Not Available</p>
            @else
            <p>Available</p>
            @endif
          </td>
          <td>{{ $title->status }}</td>
          <td class="text-center">
            <a href="/titleinfos/{{$title->id}}" class="w3-button w3-blue w3-round-large" style="padding: 5px;">Details</a>
          </td>
        </tr>
        @endforeach

      </table>

    </div>
	</div>
</div>


</x-sidebarPanel>
