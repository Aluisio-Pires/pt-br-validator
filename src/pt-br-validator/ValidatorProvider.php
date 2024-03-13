<?php

namespace AluisioPires\PtBrValidator;

use Illuminate\Support\ServiceProvider;

class ValidatorProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;


    /**
     * Bootstrap the application events.
     *
     * @return void
     */

    public function boot()
    {
        $rules = [
            'celular'                        => \AluisioPires\PtBrValidator\Rules\Celular::class,
            'celular_com_ddd'                => \AluisioPires\PtBrValidator\Rules\CelularComDdd::class,
            'celular_com_codigo'             => \AluisioPires\PtBrValidator\Rules\CelularComCodigo::class,
            'celular_com_codigo_sem_mascara' => \AluisioPires\PtBrValidator\Rules\CelularComCodigoSemMascara::class,
            'cnh'                            => \AluisioPires\PtBrValidator\Rules\Cnh::class,
            'cnpj'                           => \AluisioPires\PtBrValidator\Rules\Cnpj::class,
            'cns'                            => \AluisioPires\PtBrValidator\Rules\Cns::class,
            'cpf'                            => \AluisioPires\PtBrValidator\Rules\Cpf::class,
            'formato_cnpj'                   => \AluisioPires\PtBrValidator\Rules\FormatoCnpj::class,
            'formato_cpf'                    => \AluisioPires\PtBrValidator\Rules\FormatoCpf::class,
            'telefone'                       => \AluisioPires\PtBrValidator\Rules\Telefone::class,
            'telefone_com_ddd'               => \AluisioPires\PtBrValidator\Rules\TelefoneComDdd::class,
            'telefone_com_codigo'            => \AluisioPires\PtBrValidator\Rules\TelefoneComCodigo::class,
            'formato_cep'                    => \AluisioPires\PtBrValidator\Rules\FormatoCep::class,
            'formato_placa_de_veiculo'       => \AluisioPires\PtBrValidator\Rules\FormatoPlacaDeVeiculo::class,
            'formato_pis'                    => \AluisioPires\PtBrValidator\Rules\FormatoPis::class,
            'pis'                            => \AluisioPires\PtBrValidator\Rules\Pis::class,
            'cpf_ou_cnpj'                    => \AluisioPires\PtBrValidator\Rules\CpfOuCnpj::class,
            'formato_cpf_ou_cnpj'            => \AluisioPires\PtBrValidator\Rules\FormatoCpfOuCnpj::class,
            'uf'                             => \AluisioPires\PtBrValidator\Rules\Uf::class,
        ];

        foreach ($rules as $name => $class) {
            $rule = new $class;

            $extension = static function ($attribute, $value) use ($rule) {
                return $rule->passes($attribute, $value);
            };

            $this->app['validator']->extend($name, $extension, $rule->message());
        }
    }


    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
}
