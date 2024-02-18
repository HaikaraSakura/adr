<?php

declare(strict_types=1);

namespace Haikara\Adr\Http\Payload\ViewAdapter\Typewriter;

use Haikara\Typewriter\ViewModelInterface;
use Haikara\Adr\Http\Payload\ViewInterface;

interface TypewriterAdapterInterface extends ViewInterface
{
    /**
     * テンプレートファイルのベースパスを指定する。
     * @param string $basePath
     * @return void
     */
    public function setBasePath(string $basePath): void;

    /**
     * @param ViewModelInterface $viewModel
     * @return void
     */
    public function setViewModel(ViewModelInterface $viewModel): void;

    /**
     * View変数を追加する。
     *
     * @param string $name
     * @param mixed $value
     * @return void
     */
    public function assign(string $name, mixed $value): void;
}