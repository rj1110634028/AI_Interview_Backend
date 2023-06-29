# AI_Interview_Backend

## API

### Uesrs
1. 登入 
- path：`/api/users/login`
- method：POST 
- request
    - header
    ```json
    {
    "status": true,
    "task_data": [
        {
        "id": 2,
        "titel": "task1",
        "status": false,
        "create_user": "admin",
        "update_user": "admin",
        "description": null,
        "tag": null,
        "image": null,
        "card_id": 10,
        "created_at": "2020-09-07T05:31:09.000000Z",
        "updated_at": "2020-09-07T05:31:09.000000Z"
        }
        ]
    }
    ```
    - body
    ```json
    {
    "status": true,
    "task_data": [
        {
        "id": 2,
        "titel": "task1",
        "status": false,
        "create_user": "admin",
        "update_user": "admin",
        "description": null,
        "tag": null,
        "image": null,
        "card_id": 10,
        "created_at": "2020-09-07T05:31:09.000000Z",
        "updated_at": "2020-09-07T05:31:09.000000Z"
        }
        ]
    }
    ```
- response
    - status code 200
    ```json
    {
    "status": true,
    "task_data": [
        {
        "id": 2,
        "titel": "task1",
        "status": false,
        "create_user": "admin",
        "update_user": "admin",
        "description": null,
        "tag": null,
        "image": null,
        "card_id": 10,
        "created_at": "2020-09-07T05:31:09.000000Z",
        "updated_at": "2020-09-07T05:31:09.000000Z"
        }
        ]
    }
    ```
    - status code 400
3. 註冊 **POST** `/api/users/signup`
4. 登出 **GET** `/api/users/logout`
5. 查看個人資訊 **GET** `/api/users/profile`
6. 修改個人資訊 **PATCH** `/api/users/profile`
7. 更新令牌 **GET** `/api/token/refresh`

### Resumes
1. 查看履歷 **GET** `/api/resumes`
2. 新增履歷 **POST** `/api/resumes`
3. 修改履歷 **PATCH** `/api/resumes`

### InterviewRecords
1. 查看面試紀錄 **GET** `/api/interview_records`
2. 新增面試紀錄 **POST** `/api/interview_records`

### Discussions
1. 發布討論 **POST** `/api/discussions`
2. 查看全部的討論 **GET** `/api/discussions`
3. 查看特定篇討論 **GET** `/api/discussions/{discussion}`
4. 查看自己的討論 **GET** `/api/discussions/users`
5. 編輯討論 **PATCH** `/api/discussions/{discussion}`
6. 刪除討論 **DELETE** `/api/discussions/{discussion}`

### Comments
1. 查看留言 **GET** `/api/comments/{discussion}`
2. 新增留言 **POST** `/api/comments/{discussion}`
3. 編輯留言 **PATCH** `/api/comments/{discussion}`
4. 刪除留言 **DELETE** `/api/comments/{discussion}`

### Experiences
1. 發布面試分享 **POST** `/api/experiences`
2. 查看全部的面試分享 **GET** `/api/experiences`
3. 查看特定篇面試分享 **GET** `/api/experiences/{experiences}`
4. 查看自己的面試分享 **GET** `/api/experiences/users`
5. 編輯面試分享 **PATCH** `/api/experiences/{experiences}`
6. 刪除面試分享 **DELETE** `/api/experiences/{experiences}`

### Favorites
1. 新增討論收藏 **POST** `/api/favorites/discussions/{discussion}`
2. 新增面試分享收藏 **POST** `/api/favorites/experiences/{experiences}`
3. 查看收藏 **GET** `/api/favorites`
4. 取消收藏 **DELETE** `/api/favorites/{favorites}`

### Questions
1. ...

## Issue
1. 題庫因為不會與其他資料表關聯，並且只有Python會用到，是否用較簡單的格式，例如Json來存，讓Python直接存取。
2. 如何根據職缺判斷出題。
