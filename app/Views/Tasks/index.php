<?= $this->extend("layouts/default")?>

<?= $this->section('title') ?> Tasks <?= $this->endSection() ?>

<?= $this->section("content") ?>
    
    <h1 class="title">Tasks</h1>
    <a class="button is-link" href="<?= site_url("/tasks/new") ?>">Create New Task</a>

    <div class="field w-25">
        <label class="label" for="query">Search</label>
        <div class="control">
            <input class="input" type="text" name="query" id="query">
        </div>
    </div>
    <?php if($tasks): ?>
    <ul class="list-group my-4 w-25">
        <?php foreach($tasks as $task): ?>
            <li class="list-group-item">
                <a href="<?=site_url("/tasks/show/" .  $task->id)?>"><?= esc($task->description) ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
    <?= $pager->simpleLinks() ?>
    <?php else: ?>
        <p>No tasks found</p>
    <?php endif; ?>
        

    <script src="<?= site_url('/js/auto-complete.min.js') ?>"></script>

    <script>
        var searchURL = "<?= site_url('/tasks/search?q=') ?>";

        var showURL = "<?= site_url('/tasks/show/') ?>";
        var data;
        var i;

        var searchAutoComplete = new autoComplete({
            selector: 'input[name="query"]',
            cache: false,
            source: function(term, response){
                var request = new XMLHttpRequest();

                request.open("GET", searchURL + term, true);

                request.onload = function(){

                    data =  JSON.parse(this.response);
                    i=0;
                    var suggestions = data.map(task => task.description);

                    response(suggestions);

                }

                request.send();
            },
            renderItem: function(item, search){
                var id = data[i].id;
                i++;
                return '<div class="autocomplete-suggestion" data-id="' + id + '">' + item + '</div>';
            },
            onSelect: function(e, term, item){
                window.location.href = showURL + item.getAttribute('data-id');
            }
        });
    </script>
<?= $this->endSection()?>


