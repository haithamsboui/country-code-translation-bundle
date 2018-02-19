<?php

namespace haitham\countriesBundle\TwigExtension;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpKernel\EventListener\LocaleListener;
use Symfony\Component\Intl\Intl;
use Symfony\Component\Translation\IdentityTranslator;
use Symfony\Component\Translation\Translator;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class CountryExtension extends AbstractExtension
{
    private $locale;
    private $request;

    /**
     * CountryExtension constructor.
     * @param RequestStack $requestStack
     */
    public function __construct(RequestStack $requestStack)
    {
        $this->request = $requestStack->getCurrentRequest();
        $this->locale = $this->request->getDefaultLocale();
    }


    /**
     * @return array|\Twig_Filter[]
     */
    public function getFilters()
    {
        return array(
            new TwigFilter('country', array($this, 'getCountryName')),
        );
    }

    public function getCountryName($country, $locale = null)
    {
        $countryName = Intl::getRegionBundle()->getCountryName($country, $locale != null && count(trim($locale)) != 0 ? $locale : $this->locale);

        return $countryName;
    }

}