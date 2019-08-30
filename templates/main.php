<section class="content__side">
    <h2 class="content__side-heading">Проекты</h2>

    <nav class="main-navigation">
        <ul class="main-navigation__list">
            <?php foreach($projects as $item): ?>
            <li class="main-navigation__list-item <?= $activeProject == $item['id'] ? 'main-navigation__list-item--active' : ''; ?>" >
                <a class="main-navigation__list-item-link" href="index.php?projectId=<?=$item['id'];?>"><?=$item['name'];?></a>
                <span class="main-navigation__list-item-count"><?=getCountProjects($tasks, $item['name']); ?></span>
            </li>
            <?php endforeach; ?>
        </ul>
    </nav>

    <a class="button button--transparent button--plus content__side-button" href="pages/form-project.html"
        target="project_add">Добавить проект</a>
</section>

<main class="content__main">
    <h2 class="content__main-heading">Список задач</h2>

    <form class="search-form" action="index.php" method="post" autocomplete="off">
        <input class="search-form__input" type="text" name="" value="" placeholder="Поиск по задачам">

        <input class="search-form__submit" type="submit" name="" value="Искать">
    </form>

    <div class="tasks-controls">
        <nav class="tasks-switch">
            <a href="/" class="tasks-switch__item tasks-switch__item--active">Все задачи</a>
            <a href="/" class="tasks-switch__item">Повестка дня</a>
            <a href="/" class="tasks-switch__item">Завтра</a>
            <a href="/" class="tasks-switch__item">Просроченные</a>
        </nav>

        <label class="checkbox">
            <input class="checkbox__input visually-hidden show_completed" type="checkbox"
                <?= $show_complete_tasks ? 'checked' : ''; ?> >
            <span class="checkbox__text">Показывать выполненные</span>
        </label>
    </div>

    <table class="tasks">
        <?php foreach($tasks as $key => $item): ?>
        <?php if(($show_complete_tasks === 1 || !$item["taskStatus"]) && ($activeProject === 0 || $activeProject == $item['projectId'])): ?>
        <tr class="tasks__item task
                <?php
                    if($item["taskStatus"]) {
                        print("task--completed");
                    } else if (isset($item["termDate"]) && isTaskImportant($item["termDate"])) {
                        print("task--important");
                    }
                ?>">
            <td class="task__select">
                <label class="checkbox task__checkbox">
                    <input class="checkbox__input visually-hidden task__checkbox" type="checkbox" value="<?= $key ?>"
                        <?= $item["taskStatus"] ? "checked" : ""; ?>>
                    <span class="checkbox__text"><?= htmlspecialchars($item["taskName"]); ?></span>
                </label>
            </td>

            <td class="task__file">
                <?php if (isset($item["fileUrl"])): ?>
                    <a class="download-link" href="#"><?= $item["fileUrl"]; ?></a>
                <?php endif; ?>
            </td>

            <td class="task__date">
                <?= isset($item["termDate"]) ? date("d.m.Y", strtotime($item["termDate"])) : ""; ?>
            </td>
        </tr>
        <?php endif; ?>
        <?php endforeach; ?>
    </table>
</main>
