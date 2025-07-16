<form wire:submit.prevent="save">
    <textarea wire:model="content" rows="2" placeholder="Comment..." required></textarea><br>
    <button type="submit">Submit</button>
</form>
