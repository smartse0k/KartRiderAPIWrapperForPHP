# 카트라이더 API Wrapper For PHP

PHP에서 `넥슨 카트라이더 API`를 쉽게 사용할 수 있도록 설계한 라이브러리 입니다.

https://developers.nexon.com/kart

`Data based on NEXON DEVELOPERS`

## 요구사항

1. PHP 7.0.0 이상 권장
2. ext-curl
3. ext-json

## 사용방법

모든 API는 `Phodobit\Kartrider\Api\Request` 아래에 있는 Class를 통해 작동시킬 수 있습니다.

* 샘플코드

```php
// 라이더명으로 유저 정보 조회 API 사용
$findUserByNickname = new \Phodobit\Kartrider\Api\Request\User\FindUserByNickname();

// 필수 요청 정보 Setting
$userNickname = '포도빛향기에';
$findUserByNickname->setNickname($userNickname);

// API 요청
$findUserByNickname->send();

// API 응답 가져오기
$findUserByNickNameResult = $findUserByNickname->getResult();

// 데이터 출력
echo "{$userNickname}님의 레벨은 {$findUserByNickNameResult->getLevel()}입니다.";
// => 포도빛향기에님의 레벨은 104입니다.
```

* Builder 형식 샘플코드

```php
// 라이더명으로 유저 정보 조회 API 사용
$findUserByNickname = new \Phodobit\Kartrider\Api\Request\User\FindUserByNickname();

$userNickname = '포도빛향기에';

$findUserByNickNameResult = $findUserByNickname->setNickname($userNickname)
                            ->send()
                            ->getResult();

echo "{$userNickname}님의 레벨은 {$findUserByNickNameResult->getLevel()}입니다.";
// => 포도빛향기에님의 레벨은 104입니다.
```

## Document

작성중

## 이용약관 및 라이선스

1. 모든 항목은 NEXON DEVELOPERS의 [이용가이드](https://developers.nexon.com/kart/guides), [이용약관](https://developers.nexon.com/kart/termsofservice) 보다 우선되지 않음. 

2. 본 라이브러리 개발자는 라이브러리 사용에 있어 발생하는 모든 문제에 대해 책임질 수 없으며 라이브러리 사용자가 직접 사용성, 안정성, 보안에 대한 검증이 필요하며 사용시 발생하는 모든 문제에 대한 책임은 사용자에게 있음.

3. 이 라이브러리는 누구나 사용이 가능하며, "이 라이브러리에 대한 출처 표기"는 필요 없음.

4. 이 라이브러리는 누구나 가공(수정)이 가능하며, 가공(수정)시 "이 라이브러리에 대한 출처 표기"는 필요 없음.

* (4), (5) 항목의 출처 표기라고 함은 NEXON DEVELOPERS의 "NEXON DEVELOPERS 표기"에 대한 내용과 관련 없이 "이 라이브러리에 대한" 출처 표기만을 의미함. 즉, API 사용시 "NEXON DEVELOPERS 표기"는 반드시 따라야 함.