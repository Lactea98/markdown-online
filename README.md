# # Markdown online

---

온라인으로 markdown 에디터가 있으면 얼마나 좋을까라고 생각하면서 찾다보니 editor.md 라고 웹브라우저 markdown 에디터가 있었다.

[editor.md 링크](https://github.com/pandao/editor.md "링크")

정말 내가 원하는 tool 이지만 한가지 아쉬운 점이 있었다. 현재 작성중인 markdown 문서를 저장하는 기능이 없다는 것이다.

그래서 커스터마이징 하게 되었다.

---

### Install customized editor.md

우선 editor.md를 설치하고 /editor.md/ 로 가면 example 이라는 디렉토리가 있을 것이다.

위에 업로드된 file을 다운받고 example 디렉토리에 다음과 같은 구조로 파일을 저장한다.

```
example
　└───> saveFile.php
　└───> themes.php
　└───> savefile
　　　　　└───> test.md
　└───> js
 　　　　└───> saveThisFile.js
```

그다음 example 디렉토리에 기존의 themes.html을 지우고 index.html 에 themes.html로 링크 되어 있는 것을 themes.php로 바꾼다.

https://yourdomain.kr/editor.md/example/themes.php 로 접근하면 아래처럼 submit 버튼이 활성화 된 것을 볼 수 있다.

![image](https://user-images.githubusercontent.com/38517436/64511991-63e6e000-d320-11e9-864a-b4445dedcfa3.png)


---

### Save markdown document

저장 되는지 확인하기 위해 글을 작성 후 "submit" 버튼을 누르면 아래 사진처럼 메시지가 뜨면 성공이다.

![image](https://user-images.githubusercontent.com/38517436/64512108-a0b2d700-d320-11e9-93ef-2bf24d91a024.png)


저장된 markdown 문서는 editor.md/example/savefile/filename.md 로 저장되어 있다.

파일 이름은 현재 시간으로 저장이 된다.

---

### Error to save
만약 저장하는데 실패 하게 되면 디렉토리의 권한 문제이니 savefile 디렉토리에 파일을 저장 할 권한을 부여해야 한다.
