import { Img, Row, Column, Text } from '@react-email/components';
import * as React from 'react';
import { theme } from '../styles/theme';

interface SignatureBlockProps {
  name?: string;
  role?: string;
  photoUrl?: string;
  phone?: string;
  email?: string;
}

export const SignatureBlock = ({
  name = 'Víctor García-Heras',
  role = 'CEO - Viajes Ukiyo',
  photoUrl = '/static/victor_ceo.JPG',
  phone,
  email
}: SignatureBlockProps) => {
  return (
    <>
      <style>
        {`
          @media screen and (min-width: 0) {
            .avatar-pulse {
              box-shadow: 0 0 0 0 rgba(212, 165, 116, 0.4);
              animation: pulse 3s infinite;
            }
          }
          @keyframes pulse {
            0% { box-shadow: 0 0 0 0 rgba(212, 165, 116, 0.4); }
            70% { box-shadow: 0 0 0 10px rgba(212, 165, 116, 0); }
            100% { box-shadow: 0 0 0 0 rgba(212, 165, 116, 0); }
          }
        `}
      </style>
      <Row style={containerStyle}>
        <Column style={avatarColumn}>
          <Img
            src={photoUrl}
            alt={name}
            width="64"
            height="64"
            style={avatarStyle}
            className="avatar-pulse"
          />
        </Column>
        <Column style={textColumn}>
          <Text style={nameStyle}>{name}</Text>
          <Text style={roleStyle}>{role}</Text>
          {(phone || email) && (
            <Text style={contactStyle}>
              {email && <a href={`mailto:${email}`} style={linkStyle}>{email}</a>}
              {email && phone && ' / '}
              {phone && <a href={`tel:${phone}`} style={linkStyle}>{phone}</a>}
            </Text>
          )}
        </Column>
      </Row>
    </>
  );
};

const containerStyle = {
  marginTop: '40px',
  marginBottom: '20px',
  borderTop: `1px solid ${theme.colors.border}`,
  paddingTop: '24px',
};

const avatarColumn = {
  width: '80px',
};

const avatarStyle = {
  borderRadius: '50%',
  objectFit: 'cover' as const,
  border: `2px solid ${theme.colors.accentSoft}`,
};

const textColumn = {
  verticalAlign: 'middle',
};

const nameStyle = {
  margin: '0 0 4px 0',
  fontSize: '16px',
  fontWeight: '600',
  color: theme.colors.textMain,
  fontFamily: theme.fonts.main,
};

const roleStyle = {
  margin: '0 0 6px 0',
  fontSize: '14px',
  color: theme.colors.textSecondary,
  fontFamily: theme.fonts.main,
};

const contactStyle = {
  margin: '0',
  fontSize: '13px',
  color: theme.colors.textSecondary,
};

const linkStyle = {
  color: theme.colors.primaryDark,
  textDecoration: 'none',
};

export default SignatureBlock;
