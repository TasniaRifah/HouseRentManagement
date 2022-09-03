@props(['text' => 'Delete', 'icon' => ''])

<form method="post"  style="display:inline" {{ $attributes }}> 
    @csrf
    @method('delete')
                            
        
        <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure ?')" {{ $attributes }}>
            {{ $text }}
        </button>
</form>
