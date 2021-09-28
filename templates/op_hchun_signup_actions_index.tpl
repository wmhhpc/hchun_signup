<h2 class="my">活動列表</h2>

<{$all_data.1.title}>
<{$all_data.1.action_date}>

<{if $smarty.session.hchun_signup_adm}>
    <div class="bar">
        <a href="index.php?op=hchun_signup_actions_create" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> 新增活動</a>
    </div>
<{/if}>