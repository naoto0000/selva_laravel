<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>福岡 laravel課題</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>

    <header>
        <div class="product_list_header">
            <div class="product_list_header">
                <h2 class="header_h2">商品レビュー編集確認</h2>
            </div>
            <div>
                <a href="{{ route('login_top') }}" class="list_header_product_btn">トップに戻る</a>
            </div>
        </div>
    </header>

    <main>
        <div class="detail_container">
            <div class="detail_contents">
                <div class="product_view">
                    <img src="{{ $product->image_1 }}" alt="" class="review_img">
                    <div class="product_view_text">
                        <p>{{ $product->name }}</p>
                        <div class="detail_review_contents">
                            <p class="total_review">総合評価</p>
                            <div class="review_average">
                                <p>
                                    @for ($i = 0; $i < $average; $i++) ★ @endfor </p>
                                        <p>{{ $average }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <form action="{{ route('mypage_review_complete', ['id' => $review->id, 'page' => $request->query('page')]) }}" method="post" onsubmit="disableSubmitButton()">
                @csrf
                <div class="review_regist_form">
                    <div class="review_resist_form_items">
                        <div class="review_input_group">
                            <p>商品評価</p>
                            <p>{{ session('evaluation') }}</p>
                            <input type="hidden" name="evaluation" value="{{ session('evaluation') }}">
                        </div>
                    </div>

                    <div class="review_resist_form_items">
                        <div class="review_input_group">
                            <p>商品コメント</p>
                            <p>{!! nl2br(e(session('review_comment'))) !!}</p>
                            <input type="hidden" name="review_comment" value="{{ session('review_comment') }}">
                        </div>
                    </div>
                </div>
                <div class="review_submit">
                    <input type="submit" id="submitBtn" name="" value="更新する" class="review_subimt_btn">
                </div>
            </form>

            <div class="detail_back_submit">
                <a href="{{ route('mypage_review_edit', ['id' => $review->id, 'page' => $request->query('page')]) }}" class="review_submit_back_btn">前に戻る</a>
            </div>
        </div>
    </main>
    <script>
        // フォーム送信時に呼び出される関数
        function disableSubmitButton() {
            // 送信ボタンを無効化
            document.getElementById('submitBtn').disabled = true;
        }
    </script>
</body>

</html>