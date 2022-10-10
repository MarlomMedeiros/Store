<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'            => 'Processador AMD Ryzen 5 5500, 3.6GHz (4.2GHz Max Turbo), Cache 19MB, AM4, Sem Vídeo - 100-100000457BOX',
            'price'           => $this->faker->randomFloat(2, 1.00, 3000.00),
            'amount'          => $this->faker->randomNumber(),
            'manufacturer'    => $this->faker->colorName(),
            'description'     => "<strong>Processador AMD Ryzen 5 5500</strong><br>A tecnologia do AMD StoreMI foi reconstituída desde o básico com um novo algoritmo que a tornou segura e simples de usar. Agora, a configuração do StoreMI simplesmente espelha os arquivos que você usa mais para um SSD de sua escolha, deixando intacta a versão original. O software redireciona com perfeição o Windows® e os seus aplicativos para que sejam usadas as cópias espelhadas mais velozes. Se o cache SSD for removido ou desabilitado, todos os seus arquivos no disco rígido permanecem exatamente como estavam no início.<br><br><strong><br></br>Arquitetura \"Zen 3\" de alto desempenho</strong><br>Estreando nos processadores AMD Ryzen™ Série 5000 para desktop, a arquitetura “Zen 3” é um redesenho básico da lendária família “Zen”.  Equipado com aprimoramentos de design de ponta a ponta, o “Zen 3” incorpora o foco implacável da AMD no desempenho de núcleo único, eficiência de energia e latências reduzidas. Ele está no centro dos melhores processadores de jogos do mundo.<br><br><br><strong>Menor latência</strong><br>A arquitetura “Zen 3” faz a transição para um novo design “complexo unificado” que traz 8 núcleos e 32 MB de cache L3 em um único grupo de recursos. Isso reduz drasticamente as latências core-to-core e core-to-cache, tornando cada elemento da matriz um vizinho com tempo mínimo de comunicação. Tarefas sensíveis à latência, como jogos de PC, se beneficiam especialmente dessa mudança, já que as tarefas agora têm acesso direto ao dobro do cache L3 em comparação ao “Zen 2”.<br><br><strong><br>Não possui video integrado</strong>",
            'details'         => "<strong>Características:</strong><br>- Marca: AMD<br>- Modelo: 100-100000651WOF<br><strong>Especificações:</strong><br>- Arquitetura: \"Zen 3\"<br>- Nº de núcleos de CPU: 6<br>- Multithreading (SMT): sim<br>- Nº de threads: 12<br>- Clock Max Boost: Até 4.2GHz<br>- Clock básico: 3,6 GHz<br>- Cachê L1 total: 384 KB<br>- Cachê L2 total: 3 MB<br>- Cachê L3 total: 16 MB<br>- TDP / TDP Padrão: 65 W<br>- Tecnologia de processador para núcleos de CPU: TSMC 7nm FinFET<br>- Processor Technology for I/O Die: 12nm (Globalfoundries)<br>- Tamanho da matriz de computação da CPU (CCD): 180mm²<br>- Soquete da CPU: AM4<br>- Contagem de soquetes: 1P<br>- Tecnologia de aumento de CPU: Aumento de precisão 2<br>- Conjunto de instruções: x86-64<br>- Extensões compatíveis: AES, AMD-V, AVX, AVX2, FMA3, MMX(+), SHA, SSE, SSE2, SSE3, SSE4.1, SSE4.2, SSE4A, SSSE3, x86-64<br>- Solução térmica (PIB): Não incluso<br>- Tempo máximo: 90°C<br><strong> *Suporte de SO:</strong><br>- Edição Windows 11 - 64-Bit<br>- Edição Windows 10 - 64-Bit<br>- RHEL x86 64 bits<br>- Ubuntu x86 64 bits<br>*O suporte ao sistema operacional (SO) poderá variar de acordo com o fabricante.<br>Chipsets de suporte:<br>- X570<br>- X470<br>- X370<br>- B550<br>- B450<br>- B350<br>- A520<br>Memória:<br>- Suporte a USB Tipo C: sim<br>- Portas nativas USB 3.2 Gen 2 (10 Gbps): 4<br>- Portas nativas USB 3.2 Gen 1 (5 Gbps): 0<br>- Portas nativas USB 2.0 (480Mbps): 0<br>- Portas SATA nativas: 2<br>- Versão do PCI Express: PCIe 3.0<br>- Pistas PCIe nativas (total/utilizável): 24/20<br>- Suporte NVMe: Boot, RAID0, RAID1, RAID10<br>- Tipo de memória: DDR4<br>- Canais de memória: 2<br>- Máx. Memória: 128 GB<br>- Subtipo de memória do sistema: UDIMM<br>- Suporte ECC: Up to 3200MHz<br>PCIe utilizáveis ​​adicionais da placa-mãe<br>- AMD X570: 16x Geração 3<br>- AMD X470: 2x Geração 3<br>- AMD X470: 8x Geração 2<br>Velocidade máxima de memória<br>- 2x1R: DDR4-3200<br>- 2x2R: DDR4-3200<br>- 4x1R: DDR4-2933<br>- 4x2R: DDR4-2667<br>Tecnologias compatíveis<br>- Arquitetura de núcleo AMD \"Zen 3\"<br>- Premium AMD Ryzen™ VR-Ready<br>Conteúdo da Embalagem:<br>- 01 x Processador AMD Ryzen 5 5500, Cache 19MB, 3.6GHz (4.2GHz Max Turbo), AM4, Sem Vídeo<br>Garantia:<br>12 meses de garantia<br>Peso:<br>410 gramas (bruto com embalagem)<br>",
            'photo'           => 'images/product.jpg',
            'sub_category_id' => $this->faker->numberBetween(1, SubCategory::query()->inRandomOrder()->get()->first()->id),
        ];
    }
}
