# LINEログインMIDをユーザーIDに変換する（PHP）

LINEログインv1のエンドポイントの提供が2018年3月31日で終了します。

終了するアクセストークンエンドポイント： https://api.line.me/v1/oauth/accessToken

LINEログインを通じて取得できるユーザー識別子が変更になります。具体的には、LINEログインv1ではMIDだったものが、v2以降ではユーザーIDに。

LINEログインv1で提供中のWEBサービスでLINEログインを使用しているお客様のMIDをユーザーIDに変更するPHPスクリプトを書きました。

詳細はこちら=> [LINEディベロッパーズ公式ドキュメント](https://developers.line.me/ja/docs/line-login/converting-mid-to-userid/).

## 使い方

1. convert_mid2uid.php をダウンロードしてください。
2. YOUR_CLIENT_ID,YOUR_CLIENT_SECRET をあなたのものに書き換えてください。
3. 「https:// 」でアクセスできるドメインのサーバーにconvert_mid2uid.php をアップロードしてください。
4. ブラウザから「https://example.com/convert_mid2uid.php?mid={チェックしたいMID}」にアクセスしてください。

## Author

Nobuhiro Kamioka