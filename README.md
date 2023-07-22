# AI_Interview_Backend

## API

### Uesrs
1. 登入 
- path：`/api/users/login`
- method：POST 
- request
    - body
    ```json
    {
        "account": "jane99168",
        "password": "dfgdf441geDSFs", // 必須8碼以上，且必須有大小寫字母及數字
        "keep_logged_in": false,      // 是否保持登入  
    }
    ```
- response
    - status code 200
    ```json
    {
        "token": "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IkpvaG4gRG9lIiwiaWF0IjoxNTE2MjM5MDIyfQ.SflKxwRJSMeKKF2QT4fwpMeJf36POk6yJV_adQssw5c",
        "user_data": [
            {
            "id": 1,
            "name": "Jane",
            "avator": "照片路徑"
            }
        ]
    }
    ```
    - status code 400
    ```json
    {
        "message": "帳號或密碼輸入錯誤",
    }
    ```
2. 註冊 
- path：`/api/users/signup`
- method：POST 
- request
    - body
    ```json
    {
        "name":"jane",
        "email": "jane99168@gmail.com",
        "account": "jane99168",
        "password": "dfgdf441geDSFs" // 必須8碼以上，且必須有大小寫字母及數字
    }
    ```
- response
    - status code 200
    ```json
    {
        "message": "註冊成功",
    }
    ```
    - status code 400
    ```json
    {
        "message": "註冊資料有誤",
    }
    ```
    - status code 400
    ```json
    {
        "message": "信箱已註冊過",
    }
    ```
3. 登出
- path：`/api/users/logout`
- method：GET 
- request
    - header
    ```json
    {
        "token": "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IkpvaG4gRG9lIiwiaWF0IjoxNTE2MjM5MDIyfQ.SflKxwRJSMeKKF2QT4fwpMeJf36POk6yJV_adQssw5c",
    }
    ```
- response
    - status code 200
    ```json
    {
        "message": "登出成功",
    }
    ```
    - status code 401
    ```json
    {
        "message": "未登入",
    }
    ```
4. 查看個人資訊
- path：`/api/users/profile`
- method：GET
- request
    - header
    ```json
    {
        "token": "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IkpvaG4gRG9lIiwiaWF0IjoxNTE2MjM5MDIyfQ.SflKxwRJSMeKKF2QT4fwpMeJf36POk6yJV_adQssw5c",
    }
    ```
- response
    - status code 200
    ```json
    {
        "name": "Jane",
        "avator": "照片路徑",
        "phone":0912345678,
        "address":"台中市北北區XXXX",
        "sex":"F|M",
        "birthday":"2002/01/01",
        "status":"在學中",
        "highest_education":"大學",
        "seniority": "一年以下",
        "created_at": "2020-09-07T05:31:09.000000Z",
    }
    ```
    - status code 401
    ```json
    {
        "message": "權限不足",
    }
    ```
5. 修改個人資訊
- path：`/api/users/profile`
- method：PATCH 
- request
    - header
    ```json
    {
        "token": "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IkpvaG4gRG9lIiwiaWF0IjoxNTE2MjM5MDIyfQ.SflKxwRJSMeKKF2QT4fwpMeJf36POk6yJV_adQssw5c",
    }
    ```
    - body
    ```json
    {
        "name": "Jane",
        "avator": "照片路徑",
        "phone":0912345678,
        "address":"台中市北北區XXXX"
        "sex":"F|M"
        "birthday":"2002/01/01"
        "status":"在學中",
        "highest_education":"大學",
        "seniority": "一年以下",
    }
    ```
- response
    - status code 200
    ```json
    {
        "message": "更新成功",
    }
    ```
    - status code 400
    ```json
    {
        "message": "資料有誤",
    }
    ```
    - status code 401
    ```json
    {
        "message": "權限不足",
    }
    ```
6. 更新令牌
- path：`/api/token/refresh`
- method：GET 
- request
    - header
    ```json
    {
        "token": "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IkpvaG4gRG9lIiwiaWF0IjoxNTE2MjM5MDIyfQ.SflKxwRJSMeKKF2QT4fwpMeJf36POk6yJV_adQssw5c",
    }
    ```
- response
    - status code 200
    ```json
    {
        "token": "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IkpvaG4gRG9lIiwiaWF0IjoxNTE2MjM5MDIyfQ.SflKxwRJSMeKKF2QT4fwpMeJf36POk6yJV_adQssw5c"
    }
    ```
    - status code 401
    ```json
    {
        "message": "權限不足",
    }
    ```

### Resumes
1. 查看履歷
- path：`/api/resumes`
- method：GET 
- request
    - header
    ```json
    {
        "token": "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IkpvaG4gRG9lIiwiaWF0IjoxNTE2MjM5MDIyfQ.SflKxwRJSMeKKF2QT4fwpMeJf36POk6yJV_adQssw5c",
    }
    ```
- response
    - status code 200
    ```json
    {
        "autobiography":"我來自......"
        "education":[
            {
                "school": "台中科技大學資訊管理系五專部",
                "admission_date": "2017/09/01",
                "date_of_graduation": "2022/06/01"
            },
            {
                "school": "台中科技大學資訊管理系二技部",
                "admission_date": "2022/09/01",
                "date_of_graduation": "在學中"
            },
            ...
        ],
        "work_experience":[
            {
                "company": "創科資訊",
                "start_work": "2022/01/01",
                "position":"Intern",
                "resign": "2022/03/01"
            },
            {
                "company": "鼎新",
                "start_work": "2023/06/01",
                "position":"開發工程師Intern",
                "resign": "在職中"
            },
            ...
        ],
        "Portfolio":[
            {
                "title":"",
                "description":""
            },
            {
                "title":"",
                "description":""
            },
            ...
        ],
        "skill":["PHP","Java"]
    }
    ```
    - status code 401
    ```json
    {
        "message": "權限不足",
    }
    ```
2. 新增履歷
- path：`/api/resumes`
- method：POST 
- request
    - header
    ```json
    {
        "token": "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IkpvaG4gRG9lIiwiaWF0IjoxNTE2MjM5MDIyfQ.SflKxwRJSMeKKF2QT4fwpMeJf36POk6yJV_adQssw5c",
    }
    ```
    - body
    ```json
    {
        "autobiography":"我來自......"
        "education":[
            {
                "school": "台中科技大學資訊管理系五專部",
                "admission_date": "2017/09/01",
                "date_of_graduation": "2022/06/01"
            },
            {
                "school": "台中科技大學資訊管理系二技部",
                "admission_date": "2022/09/01",
                "date_of_graduation": "在學中"
            },
            ...
        ],
        "work_experience":[
            {
                "company": "創科資訊",
                "start_work": "2022/01/01",
                "position":"Intern",
                "resign": "2022/03/01"
            },
            {
                "company": "鼎新",
                "start_work": "2023/06/01",
                "position":"開發工程師Intern",
                "resign": "在職中"
            },
            ...
        ],
        "Portfolio":[
            {
                "title":"",
                "description":""
            },
            {
                "title":"",
                "description":""
            },
            ...
        ],
        "skill":["PHP","Java"]
    }
    ```
- response
    - status code 200
    ```json
    {
        "message": "新增成功"
    }
    ```
    - status code 400
    ```json
    {
        "message": "資料填寫有誤"
    }
    ```
    - status code 401
    ```json
    {
        "message": "權限不足"
    }
    ```
3. 修改履歷
- path：`/api/resumes`
- method：PATCH 
- request
    - header
    ```json
    {
        "token": "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IkpvaG4gRG9lIiwiaWF0IjoxNTE2MjM5MDIyfQ.SflKxwRJSMeKKF2QT4fwpMeJf36POk6yJV_adQssw5c",
    }
    ```
    - body
    ```json
    {
        "autobiography":"我來自......"
        "education":[
            {
                "school": "台中科技大學資訊管理系五專部",
                "admission_date": "2017/09/01",
                "date_of_graduation": "2022/06/01"
            },
            {
                "school": "台中科技大學資訊管理系二技部",
                "admission_date": "2022/09/01",
                "date_of_graduation": "在學中"
            },
            ...
        ],
        "work_experience":[
            {
                "company": "創科資訊",
                "start_work": "2022/01/01",
                "position":"Intern",
                "resign": "2022/03/01"
            },
            {
                "company": "鼎新",
                "start_work": "2023/06/01",
                "position":"開發工程師Intern",
                "resign": "在職中"
            },
            ...
        ],
        "Portfolio":[
            {
                "title":"",
                "description":""
            },
            {
                "title":"",
                "description":""
            },
            ...
        ],
        "skill":["PHP","Java"]
    }
    ```
- response
    - status code 200
    ```json
    {
        "autobiography":"我來自......"
        "education":[
            {
                "school": "台中科技大學資訊管理系五專部",
                "admission_date": "2017/09/01",
                "date_of_graduation": "2022/06/01"
            },
            {
                "school": "台中科技大學資訊管理系二技部",
                "admission_date": "2022/09/01",
                "date_of_graduation": "在學中"
            },
            ...
        ],
        "work_experience":[
            {
                "company": "創科資訊",
                "start_work": "2022/01/01",
                "position":"Intern",
                "resign": "2022/03/01"
            },
            {
                "company": "鼎新",
                "start_work": "2023/06/01",
                "position":"開發工程師Intern",
                "resign": "在職中"
            },
            ...
        ],
        "Portfolio":[
            {
                "title":"",
                "description":""
            },
            {
                "title":"",
                "description":""
            },
            ...
        ],
        "skill":["PHP","Java"]
    }
    ```
    - status code 400
    ```json
    {
        "message": "資料有誤"
    }
    ```
    - status code 401
    ```json
    {
        "message": "權限不足"
    }
    ```

### InterviewRecords
1. 查看全部面試紀錄 ``
- path：`/api/interview_records`
- method：GET 
- request
    - header
    ```json
    {
        "token": "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IkpvaG4gRG9lIiwiaWF0IjoxNTE2MjM5MDIyfQ.SflKxwRJSMeKKF2QT4fwpMeJf36POk6yJV_adQssw5c",
    }
    ```
- response
    - status code 200
    ```json
    {
        "interview_id":1,
        "created_at":"2023/06/30",
        "question_and_answer":[
            {
                "question":"自我介紹",
                "answer":"你好你好",
                "speech_rate":40
            },
            {
                "question":"為何選擇我們公司",
                "answer":"挖阿災"
                "speech_rate":40
            },...
        ]
        "improved":["常常沒有直視前方",...]
    },...
    ```
    - status code 401
    ```json
    {
        "message": "權限不足",
    }
    ```
3. 新增面試紀錄
- path：`/api/interview_records`
- method：POST 
- request
    - header
    ```json
    {
        "token": "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IkpvaG4gRG9lIiwiaWF0IjoxNTE2MjM5MDIyfQ.SflKxwRJSMeKKF2QT4fwpMeJf36POk6yJV_adQssw5c",
    }
    ```
    - body
    ```json
    {
        "question_and_answer":[
            {
                "question":"自我介紹",
                "answer":"你好你好",
                "speech_rate":40
            },
            {
                "question":"為何選擇我們公司",
                "answer":"挖阿災"
                "speech_rate":40
            },...
        ]
        "improved":["常常沒有直視前方",...]
    },...
    ```
- response
    - status code 200
    ```json
        "message": "新增成功",
    ```
    - status code 401
    ```json
    {
        "message": "資料有誤",
    }
    ```
    - status code 401
    ```json
    {
        "message": "權限不足",
    }
    ```
### Discussions
1. 發布討論
- path：`/api/discussions`
- method：POST
- request
    - header
    ```json
    {
        "token": "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IkpvaG4gRG9lIiwiaWF0IjoxNTE2MjM5MDIyfQ.SflKxwRJSMeKKF2QT4fwpMeJf36POk6yJV_adQssw5c",
    }
    ```
    - body
    ```json
    {
        "title": "面試都穿啥",
        "content":"把拉把拉Dfdgfdgdfgdfg",
        "tags":["面試穿搭",...]
    }
    ```
- response
    - status code 200
    ```json
    {
        "message": "新增成功"
    }
    ```
    - status code 401
    ```json
    {
        "message": "資料有誤",
    }
    ```
    - status code 401
    ```json
    {
        "message": "權限不足",
    }
    ```
2. 查看全部的討論
- path：`/api/discussions`
- method：GET 
- request
    
- response
    - status code 200
    ```json
    [
        {
            "discussion_id":1,
            "poster":"Jane",
            "posting_time":"2020-09-07T05:31:09.000000Z",
            "title": "面試都穿啥",
            "content":"把拉把拉Dfdgfdgdfgdfg",
            "favorites":20,
            "comments":20,
            "tags":["面試穿搭",...]

        },
        {
            "discussion_id":2,
            "poster":"Jane",
            "posting_time":"2020-09-07T05:31:09.000000Z",
            "title": "面試都穿啥",
            "content":"把拉把拉Dfdgfdgdfgdfg",
            "favorites":20,
            "comments":20,
            "tags":["面試穿搭",...]

        },...
    ]
    ```
3. 查看特定篇討論`
- path：`/api/discussions/{discussion}`
- method：GET 
- request
    
- response
    - status code 200
    ```json
    {
        "discussion_id":1,
        "poster":"Jane",
        "posting_time":"2020-09-07T05:31:09.000000Z",
        "title": "面試都穿啥",
        "content":"把拉把拉Dfdgfdgdfgdfg",
        "favorites":20,
        "comments":20,
        "tags":["面試穿搭",...]
    }
    ```
4. 查看自己的討論
- path：`/api/discussions/users`
- method：GET 
- request
    - header
    ```json
    {
        "token": "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IkpvaG4gRG9lIiwiaWF0IjoxNTE2MjM5MDIyfQ.SflKxwRJSMeKKF2QT4fwpMeJf36POk6yJV_adQssw5c",
    }
    ```
- response
    - status code 200
    ```json
    [
        {
            "discussion_id":1,
            "posting_time":"2020-09-07T05:31:09.000000Z",
            "title": "面試都穿啥",
            "description":"把拉把拉Dfdgfdgdfgdfg",
            "favorites":20,
            "comments":20,
            "tags":["面試穿搭",...]
        },
        {
            "discussion_id":2,
            "posting_time":"2020-09-07T05:31:09.000000Z",
            "title": "面試都穿啥",
            "description":"把拉把拉Dfdgfdgdfgdfg",
            "favorites":20,
            "comments":20,
            "tags":["面試穿搭",...]
        },...
    ]
    ```
    - status code 401
    ```json
    {
        "message": "權限不足",
    }
    ```
5. 編輯討論
- path：`/api/discussions/{discussion}`
- method：PATCH 
- request
    - header
    ```json
    {
        "token": "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IkpvaG4gRG9lIiwiaWF0IjoxNTE2MjM5MDIyfQ.SflKxwRJSMeKKF2QT4fwpMeJf36POk6yJV_adQssw5c",
    }
    ```
    - body
    ```json
    {
        "title": "面試都穿啥",
        "description":"把拉把拉Dfdgfdgdfgdfg",
        "tags":["面試穿搭",...]
    }
    ```
- response
    - status code 200
    ```json
    {
        "message": "編輯成功",
    }
    ```
    - status code 400
    ```json
    {
        "message": "資料有誤",
    }
    ```
    - status code 401
    ```json
    {
        "message": "權限不足",
    }
    ```
6. 刪除討論
- path：`/api/discussions/{discussion}`
- method：DELETE 
- request
    - header
    ```json
    {
        "token": "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IkpvaG4gRG9lIiwiaWF0IjoxNTE2MjM5MDIyfQ.SflKxwRJSMeKKF2QT4fwpMeJf36POk6yJV_adQssw5c",
    }
    ```
- response
    - status code 200
    ```json
    {
        "message": "刪除成功"
    }
    ```
    - status code 401
    ```json
    {
        "message": "權限不足",
    }
    ```
### Comments
1. 查看留言
- path：`/api/comments/{discussion}`
- method：GET 
- request
   - header
    ```json
    {
        "token": "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IkpvaG4gRG9lIiwiaWF0IjoxNTE2MjM5MDIyfQ.SflKxwRJSMeKKF2QT4fwpMeJf36POk6yJV_adQssw5c"
        |null
    }
    ```
- response
    - status code 200
    ```json
    [
        {
            "id":1,
            "author": {
                "id":1,
                "name":"RJ"
            },
            "comment":"ㄚㄚㄚㄚㄚ",
            "update_at":"2020-09-07T05:31:09.000000Z"
            
        },
        {
            "id":2,
            "author": {
                "id":2,
                "name":"Jane"
            },            
            "comment":"ㄚㄚㄚㄚㄚ",
            "update_at":"2020-09-07T05:31:09.000000Z"
        },...
    ]
    ```
2. 新增留言
- path：`/api/comments`
- method：POST 
- request
    - header
    ```json
    {
        "token": "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IkpvaG4gRG9lIiwiaWF0IjoxNTE2MjM5MDIyfQ.SflKxwRJSMeKKF2QT4fwpMeJf36POk6yJV_adQssw5c"
    }
    ```
    - body
    ```json
    {
        "discussion":1
        "comment":"ㄚㄚㄚㄚㄚ"
    }
    ```
- response
    - status code 200
    ```json
    {
        "message": "新增成功"
    }
    ```
    - status code 401
    ```json
    {
        "message": "資料有誤",
    }
    ```
    - status code 401
    ```json
    {
        "message": "權限不足",
    }
    ```
3. 編輯留言
- path：`/api/comments`
- method：PATCH 
- request
    - header
    ```json
    {
        "token": "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IkpvaG4gRG9lIiwiaWF0IjoxNTE2MjM5MDIyfQ.SflKxwRJSMeKKF2QT4fwpMeJf36POk6yJV_adQssw5c",
    }
    ```
    - body
    ```json
    {
        "comment_id":1,
        "comment":"ㄚㄚㄚㄚㄚ"
    }
    ```
- response
    - status code 200
    ```json
    {
        "message": "編輯成功"
    }
    ```
    - status code 401
    ```json
    {
        "message": "資料有誤",
    }
    ```
    - status code 401
    ```json
    {
        "message": "權限不足",
    }
    ```
4. 刪除留言*
- path：`/api/comments/{comment}`
- method：DELETE 
- request
    - header
    ```json
    {
        "token": "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IkpvaG4gRG9lIiwiaWF0IjoxNTE2MjM5MDIyfQ.SflKxwRJSMeKKF2QT4fwpMeJf36POk6yJV_adQssw5c",
    }
    ```
- response
    - status code 200
    ```json
    {
        "message": "刪除成功"
    }
    ```
    - status code 401
    ```json
    {
        "message": "權限不足",
    }
    ```
### Experiences
1. 發布面試分享
- path：`/api/experiences`
- method：POST 
- request
    - header
    ```json
    {
        "token": "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IkpvaG4gRG9lIiwiaWF0IjoxNTE2MjM5MDIyfQ.SflKxwRJSMeKKF2QT4fwpMeJf36POk6yJV_adQssw5c",
    }
    ```
    - body
    ```json
    {
        "company": "鼎新",
        "position":"開發工程師",
        "interview_date":"2023/06/30",
        "interview_sharing":"巴拉巴拉xxxxx",
        "interview_result":"已錄取"|"未錄取",
        "interview_difficulty":"簡單"|"中等"|"困難",
        "interview_question":["為何選擇我們公司","希望待遇?",...]
    }
    ```
- response
    - status code 200
    ```json
    {
        "message": "新增成功",
    }
    ```
    - status code 400
    ```json
    {
        "message": "資料有誤",
    }
    ```
    - status code 401
    ```json
    {
        "message": "權限不足",
    }
    ```
2. 查看全部的面試分享
- path：`/api/experiences`
- method：GET 
- request

- response
    - status code 200
    ```json
    [
        {
            "experience_id":1,
            "update_at":"2020-09-07T05:31:09.000000Z"
            "company": "鼎新",
            "position":"開發工程師",
            "interview_date":"2023/06/30",
            "interview_result":"已錄取"|"未錄取"|"等待中",
            "interview_difficulty":"簡單"|"中等"|"困難",
            "favorites":20,
            "comments":20,
        },...
    ]
    ```
3. 查看特定篇面試分享
- path：`/api/experiences/{experiences}`
- method：GET 
- request
- response
    - status code 200
    ```json
    {
        "experience_id":1,
        "author_id":1,
        "update_at":"2020-09-07T05:31:09.000000Z"
        "company": "鼎新",
        "position":"開發工程師",
        "interview_date":"2023/06/30",
        "interview_sharing":"巴拉巴拉xxxxx",
        "interview_result":"已錄取"|"未錄取"|"等待中",
        "interview_difficulty":"簡單"|"中等"|"困難",
        "interview_evaluation":5|4|3|2|1,
        "interview_question":["為何選擇我們公司","希望待遇?"],
        "favorites":20,
        "comments":20,
    }
    ```
4. 查看自己的面試分享
- path：`/api/experiences/users`
- method：GET 
- request
    - header
    ```json
    {
        "token": "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IkpvaG4gRG9lIiwiaWF0IjoxNTE2MjM5MDIyfQ.SflKxwRJSMeKKF2QT4fwpMeJf36POk6yJV_adQssw5c",
    }
    ```
- response
    - status code 200
    ```json
    [
        {
            "experience_id":1,
            "update_at":"2020-09-07T05:31:09.000000Z"
            "company": "鼎新",
            "position":"開發工程師",
            "interview_date":"2023/06/30",
            "interview_sharing":"巴拉巴拉xxxxx",
            "interview_result":"已錄取"|"未錄取"|"等待中",
            "interview_difficulty":"簡單"|"中等"|"困難",
            "interview_evaluation":5|4|3|2|1,
            "interview_question":["為何選擇我們公司","希望待遇?"],
            "favorites":20,
            "comments":20,
        },...
    ]
    ```
    - status code 401
    ```json
    {
        "message": "權限不足",
    }
    ```
5. 編輯面試分享
- path：`/api/experiences/{experiences}`
- method：PATCH 
- request
    - header
    ```json
    {
        "token": "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IkpvaG4gRG9lIiwiaWF0IjoxNTE2MjM5MDIyfQ.SflKxwRJSMeKKF2QT4fwpMeJf36POk6yJV_adQssw5c",
    }
    ```
    - body
    ```json
    {
        "interview_sharing":"巴拉巴拉xxxxx",
        "interview_result":"已錄取"|"未錄取"|"等待中",
        "interview_question":["為何選擇我們公司","希望待遇?"],
    }
    ```
- response
    - status code 200
    ```json
    {
        "message": "編輯成功",
    }
    ```
    - status code 400
    ```json
    {
        "message": "資料有誤",
    }
    ```
    - status code 401
    ```json
    {
        "message": "權限不足",
    }
    ```
6. 刪除面試分享
- path：`/api/experiences/{experiences}`
- method：DELETE 
- request
    - header
    ```json
    {
        "token": "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IkpvaG4gRG9lIiwiaWF0IjoxNTE2MjM5MDIyfQ.SflKxwRJSMeKKF2QT4fwpMeJf36POk6yJV_adQssw5c",
    }
    ```
- response
    - status code 200
    ```json
    {
        "message": "刪除成功",
    }
    ```
    - status code 401
    ```json
    {
        "message": "權限不足",
    }
    ```
### Favorites
1. 新增討論收藏
- path：`/api/favorites/discussions/{discussion}`
- method：GET 
- request
    - header
    ```json
    {
        "token": "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IkpvaG4gRG9lIiwiaWF0IjoxNTE2MjM5MDIyfQ.SflKxwRJSMeKKF2QT4fwpMeJf36POk6yJV_adQssw5c",
    }
    ```
- response
    - status code 200
    ```json
    {
        "message": "新增成功",
    }
    ```
    - status code 401
    ```json
    {
        "message": "權限不足",
    }
    ```
2. 新增面試分享收藏
- path：`/api/favorites/experiences/{experiences}`
- method：GET 
- request
    - header
    ```json
    {
        "token": "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IkpvaG4gRG9lIiwiaWF0IjoxNTE2MjM5MDIyfQ.SflKxwRJSMeKKF2QT4fwpMeJf36POk6yJV_adQssw5c",
    }
    ```
- response
    - status code 200
    ```json
    {
        "message": "新增成功",
    }
    ```
    - status code 401
    ```json
    {
        "message": "權限不足",
    }
    ```
3. 查看討論收藏
- path：`/api/favorites/discussions`
- method：GET 
- request
    - header
    ```json
    {
        "token": "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IkpvaG4gRG9lIiwiaWF0IjoxNTE2MjM5MDIyfQ.SflKxwRJSMeKKF2QT4fwpMeJf36POk6yJV_adQssw5c",
    }
    ```
- response
    - status code 200
    ```json
    [
        {
            "discussions_id":1,
            "title": "面試都穿啥",
            "content":"把拉把拉Dfdgfdgdfgdfg",
            "favorites":20,
            "comments":20,
            "tags":["面試穿搭",...]
        },...
    ]
    ```
    - status code 401
    ```json
    {
        "message": "權限不足",
    }
    ```
4. 查看面試分享收藏
- path：`/api/favorites/experiences`
- method：GET 
- request
    - header
    ```json
    {
        "token": "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IkpvaG4gRG9lIiwiaWF0IjoxNTE2MjM5MDIyfQ.SflKxwRJSMeKKF2QT4fwpMeJf36POk6yJV_adQssw5c",
    }
    ```
- response
    - status code 200
    ```json
    [
        {
            "experience_id":1,
            "update_at":"2020-09-07T05:31:09.000000Z"
            "company": "鼎新",
            "position":"開發工程師",
            "interview_date":"2023/06/30",
            "interview_result":"已錄取"|"未錄取"|"等待中",
            "interview_difficulty":"簡單"|"中等"|"困難",
            "interview_evaluation":5|4|3|2|1,
            "favorites":20,
            "comments":20,
        },...
    ]
    ```
    - status code 401
    ```json
    {
        "message": "權限不足",
    }
    ```
5. 取消收藏
- path：`/api/favorites/{favorites}`
- method：DELETE 
- request
    - header
    ```json
    {
        "token": "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IkpvaG4gRG9lIiwiaWF0IjoxNTE2MjM5MDIyfQ.SflKxwRJSMeKKF2QT4fwpMeJf36POk6yJV_adQssw5c",
    }
    ```
- response
    - status code 200
    ```json
    {
        "message": "取消成功",
    }
    ```
    - status code 401
    ```json
    {
        "message": "權限不足",
    }
    ```
### Questions
1. ...

## Issue
1. 題庫因為不會與其他資料表關聯，並且只有Python會用到，是否用較簡單的格式，例如Json來存，讓Python直接存取。
2. 如何根據職缺判斷出題。

## fix
1. 個人資訊補求職狀態、工作年資、最高學歷。
2. 履歷補作品集、自傳
