プロジェクト名:YOUR-HERO
----------
自分に影響を与えたHEROを共有するアプリです

URL:https://your-hero-tky.herokuapp.com/
![スクリーンショット 2022-01-03 11 49 22](https://user-images.githubusercontent.com/66620596/147896689-2eb73db7-b66d-402a-9b51-ed7f9c21e167.png)

制作背景
-------
私自身、特撮というジャンルが大好きなのですが中々周りにそういったことを話せる方がいないため
自分に影響を与えたHERO（広義的な意味での推し）を共有し他のユーザーと交流し合えるアプリがあればいいなと考え作成しました。

使用技術
-------

**フロントエンド**

・HTML / CSS/ Bootstrap

**バックエンド**

・PHP 7.2.34

・Laravel Framework 6.20.43

**インフラ**

・Heroku

・AWS(S3を使用した画像アップロード)

**DB**

・開発・本番環境 MySQL

**その他**

・VSCode

・Drawio（ER図）

・Git/GitHub

DB設計
-------
![スクリーンショット 2022-01-03 18 27 46](https://user-images.githubusercontent.com/66620596/147915849-6bec4e79-c1cd-4529-8054-84f46d330dd5.png)

機能一覧
--------

**会員登録関連**

・アカウント新規登録、プロフィール編集機能

・ログイン、ログアウト機能

・ゲストユーザーログイン機能

**投稿関連機能**

・HERO投稿、HERO編集、HERO削除（論理削除)

・画像アップロード機能 (AWS S3バケット)

・HERO検索機能

・コメント関連機能

・いいね機能(実装予定)

HERO投稿
---------
![hero投稿](https://user-images.githubusercontent.com/66620596/148779942-906a0ff5-dcd7-4829-a412-2bea832777ea.gif)

HERO検索
---------
![hero検索](https://user-images.githubusercontent.com/66620596/148780618-7ddd8c39-7675-4f9b-8a44-6b6c9ec106fe.gif)

コメント機能
---------
![heroコメント](https://user-images.githubusercontent.com/66620596/148780891-68ec1cb5-21de-47d0-90f5-bbdea54d1282.gif)


今後追加していきたい機能など
---------

・いいね機能、いいね一覧機能

・ユーザーのフォロー機能

・サービスクラスを使ったコントローラーのリファクタリング

・AWSへのデプロイ
