import * as React from 'react';
import { EmailLayout } from '../components/EmailLayout';
import { Header } from '../components/Header';
import { Footer } from '../components/Footer';
import { SectionTitle } from '../components/SectionTitle';
import { Paragraph } from '../components/Paragraph';
import { SignatureBlock } from '../components/SignatureBlock';
import { CTAButton } from '../components/CTAButton';
import { Card } from '../components/Card';
import { Section } from '@react-email/components';
import { CommonEmailProps, mockCommonProps, mockUrls, mockTripData } from '../data/mockData';

interface ProposalSentEmailProps extends CommonEmailProps {
  proposalUrl?: string;
  destination?: string;
}

export const ProposalSentEmail = ({
  clientName = mockCommonProps.clientName,
  senderName = mockCommonProps.senderName,
  senderRole = mockCommonProps.senderRole,
  senderPhotoUrl = mockCommonProps.senderPhotoUrl,
  senderEmail = mockCommonProps.senderEmail,
  senderPhone = mockCommonProps.senderPhone,
  supportEmail = mockCommonProps.supportEmail,
  proposalUrl = mockUrls.proposalUrl,
  destination = mockTripData.destination,
}: ProposalSentEmailProps) => {
  const previewText = 'Tu propuesta de viaje ya está lista.';

  return (
    <EmailLayout previewText={previewText}>
      <Header />
      <Section style={{ padding: '0 48px' }}>
        <Card>
          <SectionTitle as="h1">Hola {clientName},</SectionTitle>
          <Paragraph>
            Me alegra mucho poder decirte que tu viaje a {destination} empieza a tomar forma.
          </Paragraph>
          <Paragraph>
            Hemos estado trabajando con mucho mimo en el diseño de tu ruta. En la propuesta que te adjunto encontrarás nuestra visión para tu viaje, una selección cuidada de alojamientos y las experiencias que creemos que marcarán la diferencia.
          </Paragraph>
          
          <CTAButton href={proposalUrl}>
            Ver mi propuesta de viaje
          </CTAButton>
          
          <Paragraph>
            Tómate tu tiempo para revisarlo todo con calma. Este es solo el punto de partida: míralo como un lienzo sobre el que podemos hacer todos los ajustes necesarios hasta que sientas que es exactamente el viaje que estabas buscando.
          </Paragraph>
          <Paragraph>
            Estaré encantado de agendar una llamada cuando la hayas visto para comentarla juntos o responder a cualquier detalle por correo.
          </Paragraph>

          <SignatureBlock 
            name={senderName} 
            role={senderRole} 
            photoUrl={senderPhotoUrl}
            email={senderEmail}
            phone={senderPhone}
          />
        </Card>
      </Section>
      <Footer supportEmail={supportEmail} />
    </EmailLayout>
  );
};

export default ProposalSentEmail;
