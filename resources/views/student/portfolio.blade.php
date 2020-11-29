<x-sidebar>

<div>
    <form action="/upload" method="post" enctype="multipart/form-data">
    @csrf
    <input type="file" name="image">
    <input type="submit" value="upload" />
</div>

</x-sidebar>