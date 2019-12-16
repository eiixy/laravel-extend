# Laravel 扩展开发

> 参考链接：[利用 Composer 的本地加载功能来优化你的扩展包开发工作流](https://learnku.com/laravel/t/11029/use-composers-local-loading-function-to-optimize-your-extended-package-development-workflow)

1. 新建代码仓库，添加composer.json文件
2. 添加子模块
    ```bash
    git submodule add <url> <path>
    # 例： git submodule add https://github.com/sczts/skeleton.git packages/sczts/skeleton
    ``` 

3. 连接本地存储库
    
    在composer.json 中添加
    ```bash
    "repositories": [
        ...
        {
            "type": "path",
            "url": "packages/sczts/skeleton"
        },
    ]
    ```

4. 引入扩展包
    ```bash
    composer require sczts/skeleton
    ```
