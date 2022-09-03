<table border="1" style="width: 100%;">
    <thead>
        <tr>
            <td>Title</td>
            <td>Description</td>
        </tr>
    </thead>

    <tbody>
        @foreach ($categories as $category)
        <tr>
            <td>{{ $category->title }}</td>
            <td>{{ $category->description }}</td>
        </tr>    
        @endforeach
        
    </tbody>
</table>