@props(['text' => 'Restore', 'icon' => ''])

    <button class="btn btn-sm " style="background-color: #29b529;" onclick="return confirm('Are you sure to restore?')" {{ $attributes }}>
    {{ $text }}
    </button>
