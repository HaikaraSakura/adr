# ADR

ADRパターンの構成する基本的なインターフェイスと抽象クラスのパッケージ。

以下のクラスを作成する

- App\Http\Top\Action\IndexAction
- App\Http\Top\Responder\IndexResponder

## Action

Actionの役割は以下

- パラメータを整理する（フィルタリング）
- ResponderにResponderInput（ドメインロジックの結果を詰めたDTO）を渡す
- Responderが返すResponseをreturnする

```PHP
namespace App\Http\Top\Action;

use Haikara\Adr\Http\ResponderInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class IndexAction implements Action {
    public function __construct(protected ResponderInterface $responder)
    {
    }
    
    public function __invoke(ServerReqestInterface $request, array $args): ResponseInterface
    {
        $user = new User(
            id: 1,
            name: 'ユーザー1',
            birthday: new DateTimeImmutable('1990-01-01')
        );
        
        $input = new class($user) implements ResponderInputInterface {
            public function __construct(protected User $user) {}
        };
        
        // Responderが返すResponseをreturnする。
        return $this->responder->respond($input);
    }
}
```

## Responder

Responderの役割は、Domainの処理結果をViewやJSONに変換すること。  
最終的にResponseを返す。

DomainのOutputに含まれるStatusによって、処理を分岐させることができる。

```PHP
namespace App\Http\Top\Responder;

use Haikara\Adr\Http\ResponderInterface;
use Psr\Http\Message\ResponseInterface;

class IndexResponder implements ResponderInterface {
    protected DatetimeImmutable $now;

    public function __construct(ClockInterface $clock) {
        $this->now = $clock->now();
    }
    
    public function __invoke(ResponderInputInterface $input): ResponseInterface {
        $user = $input->user;
        $userAge = $this->now->diff($user->birthday)->y;
        
        $this->response->getBody()->write(<<< HTML
            <p>ID：{$user->id}</p>
            <p>氏名：{$user->name}様</p>
            <p>年齢：{$userAge}歳</p>
        HTML);
        
        return $this->response;
    }
}
```
