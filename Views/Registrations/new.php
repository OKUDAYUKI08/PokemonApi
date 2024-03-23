<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
<div class="container">
    <h2 class="title ml-6 mt-6" >ユーザ新規登録画面</h2>
    <form class="box is-half mx-6 ">
        <div class="field mr-6">
            <label class="label">メールアドレス</label>
            <p class="control has-icons-left">
                <input class="input is-info" type="email" placeholder="例:abcdef@1234.com"> 
                <span class="icon is-small is-left">
                    <i class="fas fa-envelope"></i>
                </span>
            </p>
        </div>

        <div class="field mr-6">
            <label class="label">パスワード</label>
            <p class="control has-icons-left">
                <input class="input is-info" type="password" placeholder="パスワード">
                <span class="icon is-small is-left">
                    <i class="fas fa-eye"></i>
                </span>
            </p>
        </div>
        <button class="button is-primary is-outlined">登録</button>
    </form>
</div>