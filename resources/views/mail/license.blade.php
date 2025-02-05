<!-- resources/views/emails/welcome_email.blade.php -->
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>License JinyPHP</title>
    <style>
        /* 기본 스타일 */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        /* 컨테이너 */
        .container {
            background-color: #ffffff;
            border-radius: 5px;
            padding: 30px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        /* 제목 스타일 */
        h1 {
            color: #2c3e50;
            border-bottom: 2px solid #3498db;
            padding-bottom: 10px;
            margin-bottom: 20px;
            font-size: 24px;
        }

        /* 문단 스타일 */
        p {
            margin-bottom: 15px;
            font-size: 16px;
        }

        /* 라이센스 키 스타일 */
        .license-key {
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 4px;
            padding: 15px;
            margin: 20px 0;
            font-family: monospace;
            font-size: 18px;
            color: #0056b3;
        }

        /* 알림 박스 */
        .alert {
            background-color: #e1f5fe;
            border-left: 4px solid #03a9f4;
            padding: 15px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>JinyPHP 라이센스 발급</h1>

        <div class="alert">
            라이센스 발급이 완료되었습니다. 첨부파일을 다운로드 받아 /admin/license 에서 등록을 해주세요
        </div>

        <p>라이센스 정보:</p>
        <p>이름: {{ $row['name'] }}</p>
        <p>만료일자: {{ $row['expired_at'] }}</p>

        <p>등록 키:</p>
        <div class="license-key">
            {{ $row['salt'] }}
        </div>
    </div>
</body>
</html>
